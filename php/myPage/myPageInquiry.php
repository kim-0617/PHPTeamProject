<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $myMemberID = $_SESSION['myMemberID'];
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>마이페이지</title>
    <link rel="stylesheet" href="../../html/asset/css/style.css">
    <link rel="stylesheet" href="../../html/asset/css/myPageInquiry.css">

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
                    <li><a href="myPageMyTips.php">내가 쓴 글</a></li>
                    <hr>
                    <li class="active"><a href="myPageInquiry.php">내 문의 확인</a></li>
                    <li><a href="myPagePrivacy.php?myMemberID=<?=$myPageInfo['myMemberID']?>" target="_blank">개인정보수정</a></li>
                    <li><a href="myPageDie.php">회원탈퇴</a></li>
                </ul>
            </nav>
        </div>

        <section id="myPage__wrap">
            <div class="myPage__inner container">
                <div class="myPage__tab">
                    <h3 class="myPage__tab__tit">내 문의 모아보기</h3>
                </div>
<?php
    $inquiry = "SELECT * FROM myInquiry WHERE myMemberID=$myMemberID ORDER BY myInquiryID DESC";
    $inquiryResult = $connect -> query($inquiry);
    if($inquiryResult){
        $count = $inquiryResult -> num_rows;
        if($count > 0){
            for($i =1; $i <= $count; $i++){
                $info = $inquiryResult -> fetch_array(MYSQLI_ASSOC);
                $title = $info['inquiryTitle'];
                $cont = $info['inquiryContents'];
                
                echo "
                    <article class='cont'>
                        <div class='accept'>10</div>
                        <h4 class='QnA__title'>$title</h4>
                        <div class='myPageQuestion__btn'>
                            <a class='myPageQuestion__delete__btn ".$info['myInquiryID']."'>삭제</a>
                        </div>
                        <div class='QnA__date'>".date('Y-m-d', $info['regTime'])."</div>
                    </article>
                ";
            }
        }else if ($count==0) {
            echo "<div class='info__title'><h3>작성한 문의가 없습니다!<h3></div>";
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
                    location.href = `http://kkk5993.dothome.co.kr/php/myPage/myinquiryDelete.php?myInquiryID=${className}`;
                }
            });
        })
    </script>
</body>

</html>