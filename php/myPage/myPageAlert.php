<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $myMemberID = $_SESSION['myMemberID'];

    $myAlertSql = "SELECT * FROM myAlert WHERE myMemberID = '$myMemberID'";
    $myAlertResult = $connect -> query($myAlertSql);
    $myAlert = $myAlertResult -> fetch_array(MYSQLI_ASSOC);

    $myTipsID = json_decode($myAlert['myTipsID']);
    $myAlertMsg = json_decode($myAlert['myAlertMsg']);
    $regTime = json_decode($myAlert['regTime']);
    // echo "<script>alert('".count($myAlertMsg)."');</script>";
    $alertLength = -1;

    if($myAlertResult->num_rows != 0 && count($myAlertMsg) != 0){
        $alertLength = count($myAlertMsg) - 1;
    }
    // if($myAlertResult->num_rows == 0){
    //     echo "<script>alert('알림이 없습니다!')</script>";
    // } else if (count($myAlertMsg) == 0){
    //     echo "<script>alert('새로운 알림이 없습니다!')</script>";
    // } else {
    //     $alertLength = count($myAlertMsg) - 1;
    // }
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>마이페이지</title>
    <link rel="stylesheet" href="../../html/asset/css/style.css">
    <link rel="stylesheet" href="../../html/asset/css/myPageAlert.css">
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
                    <li class="active"><a href="myPageAlert.php">알림</a></li>
                    <li><a href="myPageQuestion.php">내 질문</a></li>
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
                    <h3 class="myPage__tab__tit">알림 모아보기</h3>
                </div>

<?php
    // echo $alertLength;
    if($alertLength>=0){
        for( $i=$alertLength; $i >= 0; $i--){
            $AlertMessage = "";
            $AlertLink = "";
            // echo "<script>alert('".$myAlertMsg[$i]."');</script>";
            if($myAlertMsg[$i] == 1){
                $mytipSql = "SELECT * FROM myTips WHERE myTipsID = '$myTipsID[$i]'";
                $mytipResult = $connect -> query($mytipSql);
                $mytip = $mytipResult -> fetch_array(MYSQLI_ASSOC);
                $myCateBig = $mytip['TipsCateBig'];
                $myCateSmall = $mytip['TipsCateSmall'];

                $AlertMessage = "새로운 댓글이 달렸어요!";
                $AlertLink = "http://kkk5993.dothome.co.kr/php/category/small_cg_detail.php?categoryBig='{$myCateBig}'&categorySmall='{$myCateSmall}'&myTipsID={$myTipsID[$i]}";
                // http://kkk5993.dothome.co.kr/php/category/small_cg_detail.php?categoryBig=%EC%A0%84%EC%9E%90%EA%B8%B0%EA%B8%B0&categorySmall=%EC%A4%91%EA%B3%A0&myTipsID=48
            } else if($myAlertMsg[$i] == 0){
                $AlertMessage = "새로운 답변이 달렸어요!";
                $AlertLink = "http://kkk5993.dothome.co.kr/php/myPage/myPageQuestion.php";
            }
            // echo "<script>alert('".$AlertMessage."');</script>";
            echo "<article class='myPageAlert myAlert".$i."'>
                    <h4 class='myPageAlert__title'><a href='".$AlertLink."'>".$AlertMessage."</a></h4>
                    <div class='myPageAlert__date'>".date('Y-m-d H:i',$regTime[$i])."</div>
                    <a class='myPageAlert__delete__btn' href='#'>삭제하기</a>
                </article>";
        }
    } else {
        echo "<div class='info__title'><h3>알림이 없습니다!<h3></div>";
    }
?>

                <!-- <article class="myPageAlert">
                    <h4 class="myPageAlert__title"><a href="#">새로운 댓글이 달렸어요!</a></h4>
                    <div class="myPageAlert__date">2019-02-04</div>
                    <a class="myPageAlert__delete__btn" href="#">삭제하기</a>
                </article> -->
                <!-- //myPageAlert1 -->
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
        const alertDeleteBtn = document.querySelectorAll(".myPageAlert__delete__btn");
        alertDeleteBtn.forEach( e =>{
            e.addEventListener("click", event => {
                let className = event.target.parentNode.className.split('myAlert')[1];
                event.preventDefault();
                if(!confirm("알림을 삭제하시겠습니까?")) {
                    event.preventDefault();
                    // alert("취소합니다.");
                }
                else {
                    location.href = `http://kkk5993.dothome.co.kr/php/myPage/myAlertDelete.php?myAlertNum=${className}`;
                }
            });
        });
    </script>
</body>

</html>