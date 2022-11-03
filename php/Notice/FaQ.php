<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="../../html/asset/css/style.css">
    <link rel="stylesheet" href="../../html/asset/css/FAQ.css">

    <?php 
        include "../include/link.php";
    ?>
</head>

<body>
    <?php
        include "../include/header.php";
    ?>
    
    <section id="FAQ" class="container">
        <h3>FAQ</h3>
        <ul class="FAQ__list">
            <li>
                <details>
                    <summary>서비스와 관련된 문의는 어디서 해야 하나요?</summary>
                    <p class="FAQ__answer">
                        하단의 잡스비네이터 또는 <a href="http://kkk5993.dothome.co.kr/php/Notice/inquiryWrite.php">여기</a>를 눌러 문의 사항을 보내주세요.
                    </p>
                </details>
            </li>
            <li>
                <details>
                    <summary>집에 가고 싶으면 어떻게 해야 하나요?</summary>
                    <p class="FAQ__answer">
                        숙제와 미션을 모두 끝내고 검사에 통과하시면 됩니다.
                    </p>
                </details>
            </li>
            <li>
                <details>
                    <summary>사이트가 구려요.</summary>
                    <p class="FAQ__answer">
                        그래도 이용해 주세요!
                    </p>
                </details>
            </li>
            <li>
                <details>
                    <summary>사용자나 게시글을 신고하고 싶어요.</summary>
                    <p class="FAQ__answer">
                        게시글 하단의 신고하기를 눌러, 신고 사항을 작성한 후 보내주세요.
                    </p>
                </details>
            </li>
            <li>
                <details>
                    <summary>잡스비가 귀여워요.</summary>
                    <p class="FAQ__answer">
                        감사합니다. 저희의 자랑스러운 마스코트입니다.
                    </p>
                </details>
            </li>
            <li>
                <details>
                    <summary>배고파요.</summary>
                    <p class="FAQ__answer">
                        저도요.
                    </p>
                </details>
            </li>
        </ul>
        <div class="FAQ_btn">
            <a class="btn3 inquery" href="#">1 : 1 문의</a>
            <a class="btn1" href="#">내 문의 확인</a>
        </div>
    </section>

    <?php
        include "../include/footer.php";
    ?>

    <script>
        // 1 : 1 문의하기
        const inqueryBtn = document.querySelector('.inquery');
        inqueryBtn.addEventListener('click', () => {
            location.href = "http://kkk5993.dothome.co.kr/php/Notice/inquiryWrite.php";
        });

    </script>
</body>

</html>