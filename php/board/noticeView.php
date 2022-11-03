<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>공지사항 글보기</title>
    <link rel="stylesheet" href="../../html/asset/css/style.css">
    <link rel="stylesheet" href="../../html/asset/css/noticeView.css">

    <?php 
        include "../include/link.php";
    ?>
</head>
<body>
    <?php
        include "../include/header.php";
    ?>

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
                        <tbody>
                        <?php
                            $myNoticeID = $_GET['myNoticeID'];
                            
                            $sql = "SELECT n.noticeTitle, n.myMemberID, m.youName, n.regTime, n.noticeContents FROM myNotice n JOIN myMember m ON(m.myMemberID = n.myMemberID) WHERE n.myNoticeID = {$myNoticeID};";
                            $result = $connect -> query($sql);
                            if($result) {
                                $info = $result -> fetch_array(MYSQLI_ASSOC);
                                echo "<tr><td class='noticeViewTit'><h3>[공지]{$info['noticeTitle']}</h3></td></tr>";
                                echo "<tr><td class='noticeViewTime'>".date("Y-m-d", $info['regTime'])."</td></tr>";
                                echo "<tr><td class='noticeViewCont'>{$info['noticeContents']}</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                    <div class="noticeViewBtn">
                        <a href="./noticeModify.php?myNoticeID=<?=$myNoticeID?>" class="btn3">수정하기</a>
                        <a href="./noticeDelete.php?myNoticeID=<?=$myNoticeID?>&myMemberID=<?=$info['myMemberID']?>" class="btn3" onClick="return confirm('정말 삭제하시겠습니까?')">삭제하기</a>
                        <a href="./notice.php" class="btn3">목록보기</a>
                    </div>
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