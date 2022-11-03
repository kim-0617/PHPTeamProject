<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $categoryBig = $_GET['categoryBig'];
    $categorySmall = $_GET['categorySmall'];

    $categorySql = "SELECT * FROM myTips WHERE TipsCateBig = '$categoryBig'";
    $categoryResult = $connect -> query($categorySql);
    $categoryInfo = $categoryResult -> fetch_array(MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>소분류 카테고리 페이지</title>
    <link rel="stylesheet" href="../../html/asset/css/style.css">
    <link rel="stylesheet" href="../../html/asset/css/category_S.css">

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
    
    <main id="category_S">
        <section id="banner">
            <div class="banner__inner">
                <figure>
                    <img src="../../html/asset/img/bannerBee.png" alt="마스코트">
                </figure>
                
                <div class="banner__desc">
                    <span class="sub__title">TIPS</span>
                    <h2 class="main__title"><?=$categoryInfo['TipsCateBig']?></h2>
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
                <!-- <div class="categoryIcon">
                    <a href="http://kkk5993.dothome.co.kr/php/category/small_cg.php?categoryBig=<?=$categoryBig?>&categorySmall=수리">
                        <div class="icon icon1"></div>
                        <h4>수리</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="http://kkk5993.dothome.co.kr/php/category/small_cg.php?categoryBig=<?=$categoryBig?>&categorySmall=가전">
                        <div class="icon icon2"></div>
                        <h4>가전</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="http://kkk5993.dothome.co.kr/php/category/small_cg.php?categoryBig=<?=$categoryBig?>&categorySmall=핸드폰">
                        <div class="icon icon3"></div>
                        <h4>핸드폰</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="http://kkk5993.dothome.co.kr/php/category/small_cg.php?categoryBig=<?=$categoryBig?>&categorySmall=관리">
                        <div class="icon icon4"></div>
                        <h4>관리</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="http://kkk5993.dothome.co.kr/php/category/small_cg.php?categoryBig=<?=$categoryBig?>&categorySmall=기타">
                        <div class="icon icon5"></div>
                        <h4>기타</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="http://kkk5993.dothome.co.kr/php/category/small_cg.php?categoryBig=<?=$categoryBig?>&categorySmall=드론">
                        <div class="icon icon6"></div>
                        <h4>드론</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="http://kkk5993.dothome.co.kr/php/category/small_cg.php?categoryBig=<?=$categoryBig?>&categorySmall=컴퓨터">
                        <div class="icon icon7"></div>
                        <h4>컴퓨터</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="http://kkk5993.dothome.co.kr/php/category/small_cg.php?categoryBig=<?=$categoryBig?>&categorySmall=테크">
                        <div class="icon icon8"></div>
                        <h4>테크</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="http://kkk5993.dothome.co.kr/php/category/small_cg.php?categoryBig=<?=$categoryBig?>&categorySmall=로봇">
                        <div class="icon icon9"></div>
                        <h4>로봇</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="http://kkk5993.dothome.co.kr/php/category/small_cg.php?categoryBig=<?=$categoryBig?>&categorySmall=아이디어">
                        <div class="icon icon10"></div>
                        <h4>아이디어</h4>
                    </a>
                </div> -->
            </div>
        </section>
        <!-- //category -->

        <section id="todayBestTip" class="container">
            <h3>오늘의 '<em><?=$categoryInfo['TipsCateBig']?></em>' 꿀팁 <em>BEST_3</em></h3>
            <div class="list__inner">
                <ul>
<?php
    $sql = "SELECT myTipsID, TipsTitle, TipsView, TipsCateBig, TipsCateSmall FROM myTips WHERE TipsCateBig = '$categoryBig' ORDER BY TipsView DESC LIMIT 0,3";
    $sqlResult = $connect -> query($sql);
    
    if($sqlResult){
        $sqlCount = $sqlResult -> num_rows;
        if($sqlCount > 0){
            for($i = 1; $i <= $sqlCount; $i++){
                $sqlInfo = $sqlResult -> fetch_array(MYSQLI_ASSOC);
                switch ($i) {
                    case 1 : 
                        echo "<li class='gold'><a href='http://kkk5993.dothome.co.kr/php/category/small_cg_detail.php?categoryBig=$categoryBig&categorySmall={$sqlInfo['TipsCateSmall']}&myTipsID={$sqlInfo['myTipsID']}'><h4>".$sqlInfo['TipsTitle']."</h4></a></li>";
                    break;
                    case 2 :
                        echo "<li class='silver'><a href='http://kkk5993.dothome.co.kr/php/category/small_cg_detail.php?categoryBig=$categoryBig&categorySmall={$sqlInfo['TipsCateSmall']}&myTipsID={$sqlInfo['myTipsID']}'><h4>".$sqlInfo['TipsTitle']."</h4></a></li>";
                    break;
                    case 3 :
                        echo "<li class='bronze'><a href='http://kkk5993.dothome.co.kr/php/category/small_cg_detail.php?categoryBig=$categoryBig&categorySmall={$sqlInfo['TipsCateSmall']}&myTipsID={$sqlInfo['myTipsID']}'><h4>".$sqlInfo['TipsTitle']."</h4></a></li>";
                    break;
                }
            }
        } else{
            echo "<li><a><h4> 게시글이 없습니다 </h4></a></li>";
        }
    }else {
        echo "<li><a><h4> 오류입니다. 관리자에게 문의해주세요 </h4></a></li>";
    }
    
?>
                </ul>
            </div>
        </section>

        <?php
        include "../include/footer.php";
    ?>


    </main>

    <script>
            const categoryIconBox = document.querySelector(".category__inner");
            const health = ["건강", "민간요법", "약"];
            const electronics = ["수리", "중고", "관리", "분해"];
            const cleaning = ["실내", "실외", "세탁", "세차"];
            const hobby = ["운동", "등산", "뜨개질", "드로잉"];
            const lifeStyle = ["원예", "반려동물", "운세", "퀴즈"];
            const target = document.getElementById("searchOption2");
            let categorySmall = '';

            switch("<?=$categoryBig?>") {
                case "건강" :
                    categorySmall = health;
                    break;
                case "전자기기" :
                    categorySmall = electronics;
                    break;
                case "청소" :
                    categorySmall = cleaning;
                    break;
                case "취미" :
                    categorySmall = hobby;
                    break;
                case "라이프스타일" :
                    categorySmall = lifeStyle;
                    break;
            };
            for(i=0; i<categorySmall.length; i++){
                if(categorySmall==''){
                    categorySamll = "준비중";
                    let option = `<div class="categoryIcon">
                    <a href="http://kkk5993.dothome.co.kr/php/category/small_cg.php?categoryBig=<?=$categoryBig?>&categorySmall=${categorySmall[i]}">
                        <div class="icon icon${i+1}"></div>
                        <h4>${categorySmall[i]}</h4>
                    </a>
                </div>`;
                let option2 = '';
                option2 = option;
                categoryIconBox.innerHTML += option2;
                }else{
                    let option = `<div class="categoryIcon">
                    <a href="http://kkk5993.dothome.co.kr/php/category/small_cg.php?categoryBig=<?=$categoryBig?>&categorySmall=${categorySmall[i]}">
                        <div class="icon icon${i+1}"></div>
                        <h4>${categorySmall[i]}</h4>
                    </a>
                </div>`;
                let option2 = '';
                option2 = option;
                categoryIconBox.innerHTML += option2;
                // categoryIconBox.append(option2);
                }
                
            }
        </script>
</body>

</html>