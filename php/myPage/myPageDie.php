<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>마이페이지</title>
    <link rel="stylesheet" href="../../html/asset/css/style.css">
    <link rel="stylesheet" href="../../html/asset/css/myPageDie.css">
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
                    <li><a href="myPageInquiry.php">내 문의 확인</a></li>
                    <li><a href="myPagePrivacy.php?myMemberID=<?=$myPageInfo['myMemberID']?>" target="_blank">개인정보수정</a></li>
                    <li class="active"><a href="myPageDie.php">회원탈퇴</a></li>
                </ul>
            </nav>
        </div>

        <section id="myPage__wrap">
            <div class="myPage__inner container">
                <div class="myPage__tab">
                    <h3 class="myPage__tab__tit">회원탈퇴🤷‍♀️</h3>
                </div>

                <form action="#" method="post">
                    <fieldset>
                        <legend class="blind">회원탈퇴🤷‍♀️</legend>                  
                        <div>
                            <label for="youPass">비밀번호 틀리면 탈퇴 못함</label>
                            <p style="color: red; font-size: 12px; margin-bottom: 5px ">※ 주의하세요!! 모든 글, 댓글 등 활동내역이 사라진답니다  ⎛⎝.⎛° ͜ʖ°⎞.⎠⎞   </p>
                            <input type="password" name="youPass" id="youPass" placeholder = "🤷‍♀️" >
                        </div>

                        <button type="submit" class="quit">탈퇴하기~</button>
                    </fieldset>
                </form>
            </div>
        </section>
    </main>
    <!-- //main -->

    <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        const form = document.querySelector('#myPage__wrap form');
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            pwdChecking();
            e.target[0].querySelector('input').value='';
            e.target[0].querySelector('input').focus();
        });
        
        function pwdChecking() {
            let youPass = $('#youPass').val();
            if(youPass === ""){
                alert("비밀번호를 입력하세요");
                return;
            }
            $.ajax({
                type : "POST",
                url  : "myPageDieCheck.php",
                data : {"youPass" : youPass},
                dataType : "json",
                success : function(data) {
                    if(data.result === "good") {
                        alert("안녕, 다음에 또 만나요");
                        location.href ="http://kkk5993.dothome.co.kr/php/main/main.php";
                    }
                    else {
                        alert("비밀번호가 틀렸네요 ㅋㅋ");
                    }
                },
                error : function(request, status, error) {
                    console.log("request",request);
                    console.log("status",status);
                    console.log("error",error);
                }
            });
        }
    </script>
</body>

</html>