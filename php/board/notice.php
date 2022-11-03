<?php
    header('Access-Control-Allow-Origin: *');
    include "../connect/connect.php";
    include "../connect/session.php";
    // include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>공지사항</title>
    <link rel="stylesheet" href="../../html/asset/css/style.css">
    <link rel="stylesheet" href="../../html/asset/css/noticemain.css">
    
    <?php 
        include "../include/link.php";
    ?>
    
</head>
<body>
    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main">
        <section id="banner">
            <div class="banner__inner">
                <figure>
                    <img src="../../html/asset/img/bannerBee.png" alt="마스코트">
                </figure>
                <div class="banner__desc">
                    <span class="sub__title">notice</span>
                    <h2 class="main__title">공지사항</h2>
                    <p class="banner__info">
                        잡스비에서 알려드립니다.
                    </p>
                </div>
                
            </div>
        </section>
        <!-- //banner -->

        <section id="notice" class="container">
            <div class="notice_inner">
                <h2>공지사항</h2>
                
                <div class="notice_table">
                    <table>
                        <colgroup>
                            <col style="width: 23%">
                            <col style="width: 77%">
                        </colgroup>
                        <tbody>
<?php
    if(isset($_GET['page'])){
        $page = (int)$_GET['page'];
    } else {
        $page = 1;
    }
    $viewNum = 5;
    $viewLimit = ($viewNum * $page) - $viewNum;

    // 두개의 테이블 join
    $sql = "SELECT b.myNoticeID, b.noticeTitle, b.regTime FROM myNotice b JOIN myMember m ON (b.myMemberID = m.myMemberID) ORDER BY regTime DESC LIMIT {$viewLimit}, {$viewNum}";
    $result = $connect -> query($sql);

    // 전체 글 갯수
    $totalSql = "SELECT count(myNoticeID) FROM myNotice";
    $totalResult = $connect -> query($totalSql);
    
    $boardCount = $totalResult -> fetch_array(MYSQLI_ASSOC);
    $boardCount = $boardCount['count(myNoticeID)'];
    
    if($result){
        $count = $result -> num_rows;
        // echo "cnt".$count."<br>";
        // echo $sql;
        if($count > 0){
            for($i=1; $i <= $count; $i++){
                $info = $result -> fetch_array(MYSQLI_ASSOC);
                echo "<tr>";
                if(($i === 1 || $i === 2 || $i === 3) && $_GET['page'] < 2){
                    echo "<td>notice</td>";
                    echo "<td class='bold'><a href='noticeView.php?myNoticeID={$info['myNoticeID']}'>".$info['noticeTitle']."</a></td>";
                } else {
                    echo "<td>".date('Y-m-d', $info['regTime'])."</td>";
                    echo "<td><a href='noticeView.php?myNoticeID={$info['myNoticeID']}'>".$info['noticeTitle']."</a></td>";
                };
                echo "</tr>";
            }
        } 
        else {
            echo "<tr><td colspan='2'>게시글이 없습니다.</td></tr>";
        }
    }
?>
                        </tbody>
                    </table>
                </div>

                <div class="board__search">
                    <div class="noticeSearch">
                        <form action="noticeSearch.php" name="noticeSearch" method="get">
                            <fieldset>
                                <legend class="blind">공지사항 검색 영역</legend>
                                <input type="search" name="searchKeyword" id="searchKeyword" placeholder="검색어를 입력하세요" aria-label="search" required>
                                <button type="submit" class="searchBtn"><span class="blind">검색</span></button>
                            </fieldset>
                        </form>
                    </div>
                </div>

                <div class="board__pages">
                    <ul>
<?php
    // 총 페이지 개수
    $boardCount = ceil($boardCount/$viewNum);

    // 현재 페이지를 기준으로 보여주고 싶은 개수
    $pageCurrent = 5;
    $startPage = $page - $pageCurrent;
    $endPage = $page + $pageCurrent;
    
    // 처음 페이지 초기화
    if($startPage < 1) $startPage = 1;
    
    // 마지막 페이지 초기화
    if($endPage >= $boardCount) $endPage = $boardCount;
    
    // 이전 페이지, 처음 페이지
    if($page != 1){
        $prevPage = $page - 1;
        echo "<li><a href='notice.php?page=1'>처음으로</a></li>";
        echo "<li><a href='notice.php?page={$prevPage}'>이전</a></li>";
    }
    
    // 페이지 넘버 표시
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($i == $page) $active = "active";
        echo "<li class='{$active}'><a href='notice.php?page={$i}'>{$i}</a></li>";
    }
    
    // 다음 페이지, 마지막 페이지
    if($page != $endPage){
        $nextPage = $page + 1;
        echo "<li><a href='notice.php?page={$nextPage}'>다음</a></li>";
        echo "<li><a href='notice.php?page={$boardCount}'>마지막으로</a></li>";
    }
?>
                    </ul>
                </div>
            </div>
        </section>
        <!-- //board -->
    </main>
    <?php
        include "../include/footer.php";
    ?>
</body>
</html>