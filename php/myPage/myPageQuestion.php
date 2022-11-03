<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $myMemberID = $_SESSION['myMemberID'];
    // $categoryBig = $_GET['categoryBig'];
    // $categorySmall = $_GET['categorySmall'];

    $myPageSql = "SELECT * FROM myQnA WHERE myMemberID = '$myMemberID' ORDER BY myQnAID DESC ";
    $myPageResult = $connect -> query($myPageSql);
    $myPageInfo = $myPageResult -> fetch_array(MYSQLI_ASSOC);
    $myPageCount = $myPageResult -> num_rows;

?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>마이페이지</title>
    <link rel="stylesheet" href="../../html/asset/css/style.css">
    <link rel="stylesheet" href="../../html/asset/css/myPageQuestion.css">

    <?php 
        include "../include/link.php";
    ?>
</head>

<body>
    <?php
        include "../include/header.php";
    ?>
    <!-- //header -->

    <main id="main" class="myPage">
        <div class="subMenu">
            <h2>마이페이지</h2>
            <hr>
            <nav>
                <ul>
                    <li><a href="myPageAlert.php">알림</a></li>
                    <li class="active"><a href="myPageQuestion.php">내 질문</a></li>
                    <li><a href="myPageMyTips.php">내가 쓴 글</a></li>
                    <hr>
                    <li><a href="myPageInquiry.php">내 문의 확인</a></li>
                    <li><a href="myPagePrivacy.php?myMemberID=<?=$myPageInfo['myMemberID']?>" target="_blank">개인정보수정</a></li>
                    <li><a href="myPageDie.php">회원탈퇴</a></li>
                </ul>
            </nav>
        </div>

        <section id="myPage__wrap">
            <div class="myPage__inner container">
                <div class="myPage__tab">
                    <h3 class="myPage__tab__tit">내 질문 모아보기</h3>
                </div>
<?php
    $myPageQustionSql = "SELECT * FROM myQnA WHERE myMemberID = '$myMemberID' ORDER BY myQnAID DESC ";
    // LIMIT {$viewLimit}, {$viewNum}
    $myPageQustionResult = $connect -> query($myPageQustionSql);
    // $cateInfo = $cateResult -> fetch_array(MYSQLI_ASSOC);
    if($myPageQustionResult){
        $count = $myPageQustionResult -> num_rows;
        if($count > 0){
            for($i =1; $i <= $count; $i++){
                $myPageQustionInfo = $myPageQustionResult -> fetch_array(MYSQLI_ASSOC);
                // echo "<script>alert('".$myPageQustionInfo['QnAAnswer']."');</script>";
                echo "
                    <article class='cont'>
                        <div class='accept'>10</div>
                        <h4 class='QnA__title'><a href='http://kkk5993.dothome.co.kr/php/Notice/QnACate.php?category=".$myPageQustionInfo['QnACategory']."'>".$myPageQustionInfo['QnATitle']."</a></h4>
                        <div class='myPageQuestion__btn'>
                            <a class='myPageQuestion__modify__btn' href='http://kkk5993.dothome.co.kr/php/Notice/QnAModify.php?QnAID=".$myPageQustionInfo['myQnAID']."'>수정</a>
                            <a class='myPageQuestion__delete__btn ".$myPageQustionInfo['myQnAID']."'>삭제</a>
                        </div>
                        <div class='icon'>
                            <a href='#' class='AnserNum'>".$myPageQustionInfo['QnAAnswer']."</span></a>
                            <a href='#' class='star active'>".$myPageQustionInfo['QnAStar']."</span></a>
                            <a href='#' class='like active'>".$myPageQustionInfo['QnAGood']."</a>
                        </div>
                        <div class='QnA__date'>".date('Y-m-d', $myPageQustionInfo['regTime'])."</div>
                    </article>
                ";
            }
        }else if ($count==0) {
            echo "<div class='info__title'><h3>작성한 질문이 없습니다!<h3></div>";
        }else {
            echo "<div class='info__title'><h3>게시글 오류입니다. 관리자에게 문의하세요!<h3></div>";
        }
            
    }
?>
                <!-- <article class="cont">
                    <div class="accept">10</div>
                    <h4 class="QnA__title"><a href="#">스미싱 당한것 같은데 신고해야 되나요?</a></h4>
                    <a class="myPageQuestion__modify__btn" href="#">수정하기</a>
                    <div class="icon">
                        <a href="#" class="AnserNum">2</span></a>
                        <a href="#" class="star active">1</span></a>
                        <a href="#" class="like active">1</a>
                    </div>
                    <div class="QnA__date">2019-02-04</div>
                </article> -->
                <!-- //cont1 -->
            </div>
        </section>
        <!-- //QnA -->
    </main>
    <!-- //main -->

    <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->
    <script>
        const deleteBtns = document.querySelectorAll('a.myPageQuestion__delete__btn');
        deleteBtns.forEach(deleteBtn => {
            deleteBtn.addEventListener('click', e => {
            let className = e.target.className.split(' ')[1];
            e.preventDefault();
                if(!confirm("정말 삭제하시겠습니까?")) {
                    e.preventDefault();
                    alert("잘생각했다.");
                }
                else {
                    history.back(1);
                }
            });
        })
    </script>
</body>

</html>