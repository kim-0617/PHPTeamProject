<?php
    header('Access-Control-Allow-Origin: *');
    include "../connect/connect.php";
    include "../connect/session.php";
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>오늘의 이슈</title>
    <link rel="stylesheet" href="../../html/asset/css/style.css">
    <link rel="stylesheet" href="../../html/asset/css/todayIssue.css">
    <link href="https://webfontworld.github.io/gmarket/GmarketSans.css" rel="stylesheet">
    <?php 
        include "../include/link.php";
    ?>
</head>

<body>
    <?php
        include "../include/header.php";
        $candidate = array();
        $targetDate = strtotime(date("Y-m-d"));

        $dateSql = "SELECT myTipsID, regTime FROM myTips ORDER BY TipsView DESC";
        $dateResult = $connect -> query($dateSql);

        $i = 0;
        foreach($dateResult as $date) {
            if(strtotime(date('Y-m-d', $date['regTime'])) == $targetDate) {
                $candidate[$i] = $date['myTipsID'];
                $i++;
            }
            if($i >= 4) break;
        }

        $dateCount = count($candidate);
        if($dateCount == 0) {
            echo "<div style='padding:20px;'>오늘의 이슈가 없습니다.</div>";
            exit;
        }

        $tips = array();
        for ($j = 0; $j < count($candidate); $j++) {
            $target = $candidate[$j];
            $getTips = "SELECT * FROM myTips WHERE myTipsID=$target ORDER BY TipsView DESC";
            $getTipsResult = $connect -> query($getTips);
            $info = $getTipsResult -> fetch_array(MYSQLI_ASSOC);
            $tips[$j] = $info;
        }
    ?>

    <main id="main">
        <section id="todayIssue">
            <span>TODAY'S ISSUE</span>
            <h2>오늘의 <em>이슈</em> 모아보기</h2>

            <div class="slider__img">
                <div class="slider__inner">
                    <?php
                        for($k = 0; $k < count($tips); $k++) {
                    ?>
                    <div class="slider <?=$tips[$k]['myTipsID']?>">
                        <div class="rank0<?=$k+1?>"></div>
                        <!-- <img src="../../html/asset/img/slider0<?=$k+1?>.jpg" alt="0<?=$k+1?>"> -->
                        <img src="<?php
                        if($tips[$k]['TipsImg'] !== NULL){
                            $thumnailImg = $tips[$k]['TipsImg'];
                            echo "../../html/asset/img/category/{$thumnailImg}";
                        }else{
                            $basicImg = $k+1;
                            echo "../../html/asset/img/slider0{$basicImg}.jpg";
                        }
                            ?>" alt="0<?=$k+1?>">
                        <div class="text">
                            <span class="cate">
                                <?=$tips[$k]['TipsCateBig']?> > <?=$tips[$k]['TipsCateSmall']?>
                            </span>
                            <p class="title">
                                <?=$tips[$k]['TipsTitle']?>
                            </p>
                            <p class="desc">
                                <?=$tips[$k]['TipsContents']?>
                            </p>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <!-- // 슬라이더 영역 -->

            <div class="slider__btn">
                <button class="prev"></button>
                <button class="next"></button>
            </div>
            <!-- // 버튼 -->
        </section>
    </main>
    <!-- //main -->

    <?php
        include "../include/footer.php";
    ?>

    <script>
        if(<?=$dateCount?> == 1) {
            let slider = document.querySelector('.slider');
            slider.classList.add('on');
        }

        if(<?=$dateCount?> > 1) {
            const sliderInner = document.querySelector('.slider__inner');
            const sliderBtn = document.querySelector('.slider__btn');
            let slider = document.querySelectorAll('.slider');
            let sliderLength = slider.length;
            const nextBtn = document.querySelector('.next');
            const prevBtn = document.querySelector('.prev');
            const sliderWidth = slider[0].offsetWidth;
            let sliderFirst = slider[0]; 
            let sliderSecond = slider[1];
            let sliderLast = slider[sliderLength - 1];
            let sliderLast2 = slider[sliderLength - 2]; 
            let cloneFirst = sliderFirst.cloneNode(true);
            let cloneSecond = sliderSecond.cloneNode(true);
            let cloneLast = sliderLast.cloneNode(true);
            let cloneLast2 = sliderLast2.cloneNode(true);
            let iamminus1 = 0;

            sliderInner.appendChild(cloneFirst);
            sliderInner.appendChild(cloneSecond);
            sliderInner.insertBefore(cloneLast, sliderFirst);

            slider = document.querySelectorAll('.slider');
            sliderInner.insertBefore(cloneLast2, slider[0]);

            let currentIndex = 0;
            slider[1].classList.add('on');
            slider[2].classList.add('on');
            
            completedSlider = document.querySelectorAll('.slider').length;
            sliderInner.style.left = -sliderWidth + "px";
            
            function gotoSlider(direction) {
                document.querySelectorAll('.slider').forEach(s => { s.classList.remove('on') });

                sliderInner.classList.add('transition');
                sliderBtn.classList.add('disable');
                posInitial = sliderInner.offsetLeft;

                if (direction === -1) {
                    sliderInner.style.left = (posInitial + sliderWidth + 40) + "px";
                    currentIndex--;
                    console.log(currentIndex);
                    // 뒤로
                    if(currentIndex === -1) {
                        slider[completedSlider - 4].classList.add('on');
                        slider[completedSlider - 3].classList.add('on');
                    }
                    else {
                        slider[currentIndex + 1].classList.add('on');
                        slider[currentIndex + 2].classList.add('on');
                    }
                } 
                else if (direction === 1) {
                    sliderInner.style.left = (posInitial - sliderWidth - 40) + "px";
                    currentIndex++;

                    // 앞으로
                    if(currentIndex === sliderLength) {
                        slider[1].classList.add('on');
                        slider[2].classList.add('on');
                    }
                    else {
                        slider[currentIndex + 1].classList.add('on');
                        slider[currentIndex + 2].classList.add('on');
                    }
                }
            }

            // 순간이동
            function checkIndex() {
                sliderInner.classList.remove('transition');
                // 마지막 이미지
                if (currentIndex === sliderLength) {
                    sliderInner.style.left = `${-(1 * sliderWidth)}px`;
                    currentIndex = 0;
                }
                // 처음 이미지
                else if (currentIndex === -1) {
                    sliderInner.style.left = `${-(sliderLength * (sliderWidth + 40))+40}px`; 
                    currentIndex = sliderLength - 1;
                }
            }

            sliderInner.addEventListener('transitionend', checkIndex);

            prevBtn.addEventListener("click", () => {
                gotoSlider(-1);
                setTimeout(() => {
                    sliderBtn.classList.remove('disable');
                }, 300);
            });

            nextBtn.addEventListener("click", () => {
                gotoSlider(1);
                setTimeout(() => {
                    sliderBtn.classList.remove('disable');
                }, 300);
            });
        }  

        // 글 넘어가게 하기
        const clickTargets = document.querySelectorAll('.slider');
        clickTargets.forEach((clickTarget) => {
            clickTarget.addEventListener('click', function(e) {
                let category = clickTarget.querySelector('span.cate').innerText.split(' > ');
                let categoryBig = category[0];
                let categorySmall= category[1];
                let myTipsID = this.className.replace('slider', '').replace('on', '');
                location.href = `http://kkk5993.dothome.co.kr/php/category/small_cg_detail.php?categoryBig=${categoryBig}&categorySmall=${categorySmall}&myTipsID=${myTipsID}`;
            });
        });
    </script>
</body>

</html>