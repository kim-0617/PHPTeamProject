<?php
    // include "../connect/session.php";
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
    <title>잡스비 검색 결과</title>
    <link rel="stylesheet" href="../../html/asset/css/style.css">
    <link rel="stylesheet" href="../../html/asset/css/jobsbeeMain.css">

    <?php 
        include "../include/link.php";
    ?>

    <style>
        #category {margin-bottom: 0;}
    </style>
</head>
<body>
    <main>
        <section id="jobsbeenator">
            <div class="jobsbee__bg">
                <div class="bgText" aria-hidden="true">jobsbeejobsbeejobsbee</div>
                <div class="bgImg"></div>
            </div>
            <div class="jobsbee__wrap">
                <div class="jobsbee__inner">
                    <div class="jobsbee__search result">
<?php

    function msg($alert){
        if($alert > 0){
            echo "<h2>잡스비가 찾아본<br>검색 결과는 ".$alert."건이에요!</h2>";
        } else {
            echo "<h2>잡스비가 열심히 찾아봤지만<br>아무것도 없었어요…</h2>";
        }
    }

    $JsearchKeyword = $_GET['JsearchKeyword'];
    $JsearchKeyword = $connect -> real_escape_string(trim($JsearchKeyword));
    // $sql = "SELECT b.myTipsID, b.TipsTitle, b.TipsCateBig, b.TipsCateSmall FROM myTips b JOIN myMember m ON (b.myMemberID = m.myMemberID) ";
    $sql = "SELECT * FROM myTips WHERE TipsTitle LIKE '%$JsearchKeyword%' ORDER BY TipsLike DESC";
    // $sql = "SELECT b.myNoticeID, b.noticeTitle, b.noticeContents, b.regTime FROM myNotice b JOIN myMember m ON(b.myMemberID = m.myMemberID)";

    // $sql .= "WHERE b.TipsTitle LIKE '%{$JsearchKeyword}%' ORDER BY TipsLike DESC ";

    $result = $connect -> query($sql);

    //전체 게시글 갯수
    $totalcount = $result -> num_rows;
    msg($totalcount);
?>
                        <ul class="scrollbarStyle">
<?php
    if($result){
        $count = $result -> num_rows;

        if($count > 0){
            for($i=1; $i <= $count; $i++){
                $info = $result -> fetch_array(MYSQLI_ASSOC);
                echo "<li><a href='http://kkk5993.dothome.co.kr/php/category/small_cg_detail.php?categoryBig={$info['TipsCateBig']}&categorySmall={$info['TipsCateSmall']}&myTipsID={$info['myTipsID']}'>".$info['TipsTitle']."</a></li>";
                // http://kkk5993.dothome.co.kr/php/category/small_cg_detail.php?myTipsID=7
            }
        } 
        else {
            echo "<p>그래도 걱정마세요!<br>QnA 게시판에 궁금한 점을<br>직접 물어볼 수 있어요.</p>";
            echo "<a class='goQNABtn' href='http://kkk5993.dothome.co.kr/php/Notice/QnACate.php'>QnA 게시판으로 이동하기</a>";
        }
    }
    ?>
                        </ul>
                        <!-- 결과 있음 -->
                        <!-- <h2>
                            잡스비가 찾아본<br>
                            검색 결과는 @@건이에요!
                        </h2>
                        <ul class="scrollbarStyle">
                            <li><a href="#">고구마 맛있게 먹는 법</a></li>
                            <li><a href="#">퍽퍽한 고구마 촉촉하게 찌는 법</a></li>
                            <li><a href="#">삶은 고구마 퍽퍽하지 않게 먹기</a></li>
                            <li><a href="#">맛탕은 역시 고구마맛탕이 제일 아니겠습니까? 이건 정말 부정할 수 없는 사실</a></li>
                            <li><a href="#">강아지한테 고구마를 너무 많이 줬더니 의사선생님이 강아지가 살쪘대요.</a></li>
                            <li><a href="#">저는 호박고구마가 좋아요.</a></li>
                            <li><a href="#">고구마말랭이 쉽게 만드는 법</a></li>
                        </ul> -->

                        <!-- 결과 없음 -->
                        <!-- <h2>
                            잡스비가 열심히 찾아봤지만<br>
                            아무것도 없었어요…
                        </h2>
                        <p>
                            그래도 걱정마세요!<br>
                            QnA 게시판에 궁금한 점을<br>
                            직접 물어볼 수 있어요.
                        </p>
                        <a class="goQNABtn" href="http://kkk5993.dothome.co.kr/php/Notice/QnACate.php">QnA 게시판으로 이동하기</a> -->
                    </div>
                    <div class="jobsbeeIcon searchYes"></div>
                </div>
                <div class="more"><a href="http://kkk5993.dothome.co.kr/php/category/category_R.php">더 알아보기</a></div>
            </div>
        </section>
        <!-- //jobsbeenator -->
    </main>
    <script>
        let count = <?php echo $totalcount; ?>;
        console.log(count);
        if(count == 0){
            document.querySelector(".jobsbeeIcon").classList.remove("searchYes");
            document.querySelector(".jobsbeeIcon").classList.add("searchNo");
        }
    </script>
</body>
</html>