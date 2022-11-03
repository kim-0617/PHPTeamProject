<?php
    include "../connect/session.php";
    include "../connect/connect.php";

    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mainPage</title>
    <link rel="stylesheet" href="../../html/asset/css/style.css">
    <link rel="stylesheet" href="../../html/asset/css/jobsbeeMain.css">
    <link rel="stylesheet" href="../../html/asset/css/category_R.css">
    <link rel="stylesheet" href="../../html/asset/css/category_S.css">

    <?php 
        include "../include/link.php";
    ?>

    <style>
        #category {margin-bottom: 0;}
        .header__none {display: none;}
    </style>
</head>
<body>
    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main>
        <section id="jobsbeenator">
            <div class="jobsbee__bg">
                <div class="bgText" aria-hidden="true">jobsbeejobsbeejobsbee</div>
                <div class="bgImg"></div>
            </div>
            <div class="jobsbee__wrap">
                <div class="jobsbee__inner">
                    <div class="jobsbee__search">
                        <h2>
                            안녕하세요! 저는 잡스비예요 :D<br>
                            무엇이 불편하신가요?
                        </h2>
                        <form action="jobsbeeSearchResult.php" name="jobsbeeSearch" method="get">
                            <fieldset>
                                <legend class="blind">잡스비 검색 영역</legend>
                                <input type="search" name="JsearchKeyword" id="JsearchKeyword" placeholder="검색어를 입력해 주세요…" aria-label="search" required>
                                <button type="submit" class="JsearchBtn"><span class="blind">검색</span></button>
                            </fieldset>
                        </form>
                        <p class="reco__keyword">추천 키워드 : <span>팁</span>, <span>운세</span>, <span>가을</span>, <span>여름</span>, <span>요리</span></p>
                    </div>
                    <div class="jobsbeeIcon"></div>
                </div>
                <div class="more"><a href="#category">더 알아보기</a></div>
            </div>
        </section>
        <!-- //jobsbeenator -->

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
                <!-- <div class="categoryIcon">
                    <a href="http://kkk5993.dothome.co.kr/php/category/category_S.php?categoryBig=건강">
                        <div class="icon icon6"></div>
                        <h4>건강</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="http://kkk5993.dothome.co.kr/php/category/category_S.php?categoryBig=전자기기">
                        <div class="icon icon7"></div>
                        <h4>전자기기</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="http://kkk5993.dothome.co.kr/php/category/category_S.php?categoryBig=청소">
                        <div class="icon icon8"></div>
                        <h4>청소</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="http://kkk5993.dothome.co.kr/php/category/category_S.php?categoryBig=취미">
                        <div class="icon icon9"></div>
                        <h4>취미</h4>
                    </a>
                </div>
                <div class="categoryIcon">
                    <a href="http://kkk5993.dothome.co.kr/php/category/category_S.php?categoryBig=라이프스타일">
                        <div class="icon icon10"></div>
                        <h4>라이프 스타일</h4>
                    </a>
                </div> -->
            </div>
        </section>
        <!-- //category -->

        <section id="todayBestTip" class="container">
            <h3>오늘의 '<em>통합</em>' 꿀팁 <em>BEST_3</em></h3>
            <div class="list__inner">
                <ul>
<?php
    $candidate = array();
    $targetDate = strtotime(date("Y-m-d"));

    $dateSql = "SELECT myTipsID, regTime FROM myTips ORDER BY TipsView DESC";
    $dateResult = $connect -> query($dateSql);

    $t = 0;
    foreach($dateResult as $date) {
        if(strtotime(date('Y-m-d', $date['regTime'])) == $targetDate) {
            $candidate[$t] = $date['myTipsID'];
            $t++;
        }
        if($t >= 3) break;
    }

    $dateCount = count($candidate);
    if($dateCount == 0) {
        echo "<div style='padding:20px;'>오늘의 이슈가 없습니다.</div>";
        exit;
    }
    
    $tips = array();
    for ($j = 0; $j < count($candidate); $j++) {
        $target = $candidate[$j];
        $getTips = "SELECT * FROM myTips WHERE myTipsID=$target";
        $getTipsResult = $connect -> query($getTips);
        $info = $getTipsResult -> fetch_array(MYSQLI_ASSOC);
        $tips[$j] = $info;
    }

    if(count($tips) === 1) {
        echo "<li class='gold'><a href='http://kkk5993.dothome.co.kr/php/category/small_cg_detail.php?categoryBig={$tips[0]['TipsCateBig']}&categorySmall={$tips[0]['TipsCateSmall']}&myTipsID={$tips[0]['myTipsID']}'><h4>".$tips[0]['TipsTitle']."</h4></a></li>";
    }
    else if(count($tips) === 2) {
        echo "<li class='gold'><a href='http://kkk5993.dothome.co.kr/php/category/small_cg_detail.php?categoryBig={$tips[0]['TipsCateBig']}&categorySmall={$tips[0]['TipsCateSmall']}&myTipsID={$tips[0]['myTipsID']}'><h4>".$tips[0]['TipsTitle']."</h4></a></li>"; 
        echo "<li class='silver'><a href='http://kkk5993.dothome.co.kr/php/category/small_cg_detail.php?categoryBig={$tips[1]['TipsCateBig']}&categorySmall={$tips[1]['TipsCateSmall']}&myTipsID={$tips[1]['myTipsID']}'><h4>".$tips[1]['TipsTitle']."</h4></a></li>";
    }
    else {
        echo "<li class='gold'><a href='http://kkk5993.dothome.co.kr/php/category/small_cg_detail.php?categoryBig={$tips[0]['TipsCateBig']}&categorySmall={$tips[0]['TipsCateSmall']}&myTipsID={$tips[0]['myTipsID']}'><h4>".$tips[0]['TipsTitle']."</h4></a></li>"; 
        echo "<li class='silver'><a href='http://kkk5993.dothome.co.kr/php/category/small_cg_detail.php?categoryBig={$tips[1]['TipsCateBig']}&categorySmall={$tips[1]['TipsCateSmall']}&myTipsID={$tips[1]['myTipsID']}'><h4>".$tips[1]['TipsTitle']."</h4></a></li>";
        echo "<li class='bronze'><a href='http://kkk5993.dothome.co.kr/php/category/small_cg_detail.php?categoryBig={$tips[2]['TipsCateBig']}&categorySmall={$tips[2]['TipsCateSmall']}&myTipsID={$tips[2]['myTipsID']}'><h4>".$tips[2]['TipsTitle']."</h4></a></li>";
    }
?>
                </ul>
            </div>
        </section>
        <!-- //todayBestTip -->

        <?php include "../include/footer.php" ?>
        <!-- //footer -->
    </main>

    <script>
        // 배경 스크롤 패럴랙스 효과
        function scroll(){
            let scrollTop = window.pageYOffset;

            const target1 = document.querySelector(".bgImg");
            const target2 = document.querySelector(".bgText");
            
            let offset1 = -scrollTop * 0.5;
            let offset2 = -scrollTop * 0.2;

            // gsap.to(target1, {target1: .3, y: offset1, ease: "power4.out"});
            // gsap.to(target2, {target1: .3, y: offset2, ease: "power4.out"});
            target1.style.top = offset1 + "px";
            target2.style.top = -25 + offset2 + "px";
            
            //헤더 보이기
            if(scrollTop > window.innerHeight - 150){
                document.querySelector("#header").classList.add("show");
            } else {
                document.querySelector("#header").classList.remove("show");
                document.querySelector("#headerAlertPopup").classList.remove("show");
            }
            requestAnimationFrame(scroll);
        }
        scroll();

        //더보기 누르면 아래로
        const moreBtn = document.querySelector(".jobsbee__wrap .more a");
        moreBtn.addEventListener("click", e => {
            e.preventDefault();

            document.querySelector(moreBtn.getAttribute("href")).scrollIntoView({behavior: "smooth"});
        });
    </script>
</body>
</html>