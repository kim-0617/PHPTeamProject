<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $myMemberID = $_SESSION['myMemberID'];
    // $categoryBig = $_GET['categoryBig'];
    // $categorySmall = $_GET['categorySmall'];

    $myPageSql = "SELECT * FROM myTips WHERE myMemberID = '$myMemberID' ORDER BY myTipsID DESC ";
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
    <link rel="stylesheet" href="../../html/asset/css/myPageMyTips.css">

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
                    <li><a href="myPageQuestion.php">내 질문</a></li>
                    <li class="active"><a href="myPageMyTips.php">내가 쓴 글</a></li>
                    <hr>
                    <li><a href="myPageInquiry.php" target="_blank">내 문의 확인</a></li>
                    <li><a href="myPagePrivacy.php?myMemberID=<?=$myPageInfo['myMemberID']?>" target="_blank">개인정보수정</a></li>
                    <li><a href="myPageDie.php">회원탈퇴</a></li>
                </ul>
            </nav>
        </div>

        <section id="myPage__wrap">
            <div class="myPage__inner container">
                <div class="myPage__tab">
                    <h3 class="myPage__tab__tit">내가 쓴 글 모아보기</h3>
                </div>
<?php

    $myPageTipsSql = "SELECT * FROM myTips WHERE myMemberID = '$myMemberID' ORDER BY myTipsID DESC ";
    // LIMIT {$viewLimit}, {$viewNum}
    $myPageTipsResult = $connect -> query($myPageTipsSql);
    // $cateInfo = $cateResult -> fetch_array(MYSQLI_ASSOC);
    if($myPageTipsResult){
        $count = $myPageTipsResult -> num_rows;
        if($count > 0){
            // if(!$myPageTipsInfo['TipsLike']){
            //     $myPageTipsInfo['TipsLike'] = 0;
            // }
            for($i =1; $i <= $count; $i++){
                $myPageTipsInfo = $myPageTipsResult -> fetch_array(MYSQLI_ASSOC);
                echo "
                    <article class='cont'>
                        <div class='info__title'>
                            <h3>
                                <a href='http://kkk5993.dothome.co.kr/php/category/small_cg_detail.php?categoryBig=".$myPageTipsInfo['TipsCateBig']."&categorySmall=".$myPageTipsInfo['TipsCateSmall']."&myTipsID=".$myPageTipsInfo['myTipsID']."'>".$myPageTipsInfo['TipsTitle']."</a>
                            </h3>
                            <div class='myPageMyTips__btn'>
                                <a class='myPageMyTips__modify__btn' href='http://kkk5993.dothome.co.kr/php/category/categoryModify.php?myTipsID=".$myPageTipsInfo['myTipsID']."'>수정</a>
                                <a class='myPageMyTips__delete__btn myPageMyTipsD".$myPageTipsInfo['myTipsID']."' href='#c'>삭제</a>
                            </div>
                            <div class='icon'>
                                <a href='#' class='like'".$myPageTipsInfo['TipsLike']."</span></a>
                                <a href='#' class='view'>".$myPageTipsInfo['TipsView']."</a>
                            </div>
                        </div>

                        <div class='info__date'>
                        ".date('Y-m-d', $myPageTipsInfo['regTime'])."
                        </div>
                    </article>
                ";
            }
            // http://kkk5993.dothome.co.kr/php/category/category_Delete.php?myTipsID=".$myPageTipsInfo['myTipsID']."
        }else if ($count==0) {
            echo "<div class='info__title'><h3>작성한 꿀팁이 없습니다! 새로 작성해 보시는건 어떨까요?<h3></div>";
        }else {
            echo "<div class='info__title'><h3>게시글 오류입니다. 관리자에게 문의하세요!<h3></div>";
        }
            
    }
?>
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
        const alertDeleteBtn = document.querySelectorAll(".myPageMyTips__delete__btn");
        alertDeleteBtn.forEach( e =>{
            e.addEventListener("click", event => {
                let className = event.target.className.split('myPageMyTipsD')[1];
                event.preventDefault();
                if(!confirm("내 팁을 삭제하시겠습니까?")) {
                    event.preventDefault();
                    // alert("취소합니다.");
                }
                else {
                    location.href = `http://kkk5993.dothome.co.kr/php/category/category_Delete.php?myTipsID=${className}`;
                }
            });
        });
    </script>
</body>

</html>