<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>대분류 카테고리 페이지</title>
    <link rel="stylesheet" href="../../html/asset/css/style.css">
    <link rel="stylesheet" href="../../html/asset/css/category_R.css">

    <?php 
        include "../include/link.php";
    ?>
</head>

<body>
    <div id="skip">
        <a href="#header">헤더 영역 바로가기</a>
        <a href="#main">컨텐츠 영역 바로가기</a>
        <a href="#footer">푸터 영역 바로가기</a>
    </div>
    <!-- //skip -->

    <?php
        include "../include/header.php";
    ?>
    
    <main id="category_R">
        <section id="banner">
            <div class="banner__inner">
                <figure>
                    <img src="../../html/asset/img/bannerBee.png" alt="마스코트">
                </figure>
                
                <div class="banner__desc">
                    <h2 class="main__title">꿀팁</h2>
                    <p class="banner__info">
                        다양한 정보를 <br>
                        종류별로 모아놨습니다.
                    </p>
                </div>
            </div>
        </section>
        <!-- //banner -->

        <section id="category" class="container">
            <h3>분류별로 꿀팁들을 찾아보세요!</h3>
            <div class="category__inner">
                <div class="categoryIcon">
                    <a href="http://kkk5993.dothome.co.kr/php/category/category_S.php?categoryBig=건강">
                        <div class="icon icon1"></div>
                        <h4>건강</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="http://kkk5993.dothome.co.kr/php/category/category_S.php?categoryBig=전자기기">
                        <div class="icon icon2"></div>
                        <h4>전자기기</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="http://kkk5993.dothome.co.kr/php/category/category_S.php?categoryBig=청소">
                        <div class="icon icon3"></div>
                        <h4>청소</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="http://kkk5993.dothome.co.kr/php/category/category_S.php?categoryBig=취미">
                        <div class="icon icon4"></div>
                        <h4>취미</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="http://kkk5993.dothome.co.kr/php/category/category_S.php?categoryBig=라이프스타일">
                        <div class="icon icon5"></div>
                        <h4>라이프 스타일</h4>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <?php
        include "../include/footer.php";
    ?>
</body>

</html>