<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $myMemberID = $_SESSION['myMemberID'];

    // 얼럿 정보 불러오기
    $myAlertSql = "SELECT * FROM myAlert WHERE myMemberID = '$myMemberID'";
    $myAlertResult = $connect -> query($myAlertSql);
    $myAlert = $myAlertResult -> fetch_array(MYSQLI_ASSOC);

    $myTipsID = json_decode($myAlert['myTipsID']);
    $myAlertMsg = json_decode($myAlert['myAlertMsg']);
    $regTime = json_decode($myAlert['regTime']);
    $myCateBig = json_decode($myAlert['TipsCateBig']);
    $myCateSmall = json_decode($myAlert['TipsCateSmall']);
    // echo "<script>alert('".count($myAlertMsg)."');</script>";
    $alertLength = -1;

    if($myAlertResult->num_rows != 0 && count($myAlertMsg) != 0){
        $alertLength = count($myAlertMsg) - 1;
    }
?>

<div id="skip">
    <a href="#header">헤더 영역 바로가기</a>
    <a href="#main">컨텐츠 영역 바로가기</a>
    <a href="#footer">푸터 영역 바로가기</a>
</div>
<!-- //skip -->

<header id="header" class="show">
    <div class="header__inner">
        <div class="left">
            <a href="http://kkk5993.dothome.co.kr/php/main/main.php"><span class="blind">메인페이지 이동</span></a>
        </div>
        <div class="middle">
            <ul>
                <li><a href="http://kkk5993.dothome.co.kr/php/todayIssue/todayIssue.php">오늘의 이슈</a></li><!-- 임시 경로 -->
                <li><a href="http://kkk5993.dothome.co.kr/php/category/category_R.php">꿀팁 저장소</a></li>
                <li><a href="http://kkk5993.dothome.co.kr/php/Notice/QnACate.php">QnA</a></li>
                <li><a href="http://kkk5993.dothome.co.kr/php/board/notice.php">공지사항</a></li>
            </ul>
        </div>
        <div class="right">
            <ul>
            <?php 
                if(isset($_SESSION['myMemberID'])) {
                ?> 
                <li><a href="http://kkk5993.dothome.co.kr/php/myPage/myPageQuestion.php" title="마이페이지"><span class="blind">마이페이지</span></a></li>
                <li><a href="#c" title="알림" class="headerAlertIcon"><span class="blind">알림</span></a></li>
                <li><a href="http://kkk5993.dothome.co.kr/php/category/categoryWrite.php" title="글쓰기"><span class="blind">글쓰기</span></a></li>
                <li><a href="../login/logout.php">로그아웃</a></li>
                <?php 
                    }  
                    else { 
                ?>
                <li style="display:none;"><a href="#c"></a></li>
                <li style="display:none;"><a href="#c"></a></li>
                <li style="display:none;"><a href="#c"></a></li>
                <li><a class="btn3 loginBtn" href="#c">로그인</a></li>
                <?php 
                    } 
                ?>
            </ul>
        </div>
        <div id="headerAlertPopup">
            <div class="header__alert__inner">
                <div class="header__alert__tit">알림</div>
                <ul class="header__alert__msg">
                    
<?php
    // echo "<pre>";
    // print_r($myTipsID);
    // echo "</pre>";

    if($alertLength>=0){
        $alertLimit = 0;
        if ($alertLength>6){
            $alertLimit = $alertLength - 5;
        }
        // echo "<script>alert('".$alertLength."');</script>";
        $seeTips = "SELECT t.myTipsID, t.TipsCateBig, t.TipsCateSmall FROM myTips t JOIN myMember m ON (t.myMemberID = m.myMemberID) WHERE t.myMemberID=$myMemberID";
        $seeResult = $connect -> query($seeTips);
        for($i=$alertLength; $i >= $alertLimit; $i--){
            $seeInfo = $seeResult -> fetch_array(MYSQLI_ASSOC);
            $big = $seeInfo['TipsCateBig'];
            $small = $seeInfo['TipsCateSmall'];
            $id = $seeInfo['myTipsID'];
            $AlertMessage = "";
            $AlertLink = "";
            // echo "<script>alert('".$myAlertMsg[$i]."');</script>";
            if($myAlertMsg[$i] == 1){
                echo $myCateBig;
                $AlertMessage = "새로운 댓글이 달렸어요!";
                // $AlertLink = "http://kkk5993.dothome.co.kr/php/category/small_cg_detail.php?myTipsID={$myTipsID[$i]}";
                $AlertLink = "http://kkk5993.dothome.co.kr/php/category/small_cg_detail.php?categoryBig=$big&categorySmall=$small&myTipsID=$id";
            } else if($myAlertMsg[$i] == 0){
                $AlertMessage = "새로운 답변이 달렸어요!";
                $AlertLink = "http://kkk5993.dothome.co.kr/php/myPage/myPageQuestion.php";
            }
            // echo "<script>alert('".$AlertMessage."');</script>";
            echo "<li class='header__alert'><a href='".$AlertLink."'><span></span>".$AlertMessage."</a></li>";
        }
    } else {
        echo "알림이 없습니다!";
    }
?>

                    <!-- <li class="header__alert"><a href="#">새 댓글이 달렸습니다!</a></li>
                    <li class="header__alert"><a href="#">새 댓글이 달렸습니다!</a></li>
                    <li class="header__alert"><a href="#">새 답변이 달렸습니다!</a></li>
                    <li class="header__alert"><a href="#">새 답변이 달렸습니다!</a></li>
                    <li class="header__alert"><a href="#">새 답변이 달렸습니다!</a></li>
                    <li class="header__alert"><a href="#">새 답변이 달렸습니다!</a></li> -->
                </ul>
                <a class="header__alert__more" href="http://kkk5993.dothome.co.kr/php/myPage/myPageAlert.php">알림 더 보기</a>
            </div>
        </div>
    </div>
</header>

<div class="header__none" aria-hidden="true">
    <div class="header__inner">
        <div class="left">
            <a href="main.html"><span class="blind">메인페이지 이동</span></a>
        </div>
        <div class="middle">
            <ul>
                <li><a href="Today_issue.html">오늘의 이슈</a></li>
                <li><a href="Tip_infor.html">꿀팁 저장소</a></li>
                <li><a href="QnA_page.html">QnA</a></li>
                <li><a href="Notice.html">공지사항~~</a></li>
            </ul>
        </div>
        <div class="right">
            <ul>
                <?php 
                    if(isset($_SESSION['myMemberID'])) {
                ?> 
                <?php echo "aaa"; ?>
                <li><a href="#" class="black"><?= $_SESSION['youName'] ?>님 환영합니다.</a></li>
                <li><a href="#"><span class="blind">알림</span></a></li>
                <li><a href="#"><span class="blind">알림</span></a></li>
                <li><a href="board_write.html"><span class="blind">글쓰기</span></a></li>
                <li><a href="../login/logout.php">로그아웃</a></li>
                
                <?php 
                    }  
                    else { 
                ?>
                <li style="display:none;"><a href="#"></a></li>
                <li style="display:none;"><a href="#"></a></li>
                <li style="display:none;"><a href="#"></a></li>
                <li><a class="btn3 loginBtn" href="#">로그인</a></li>
                <?php 
                    } 
                ?>
            </ul>
        </div>
    </div>
</div>
<!-- //header -->

<?php
    include "../login/login.php";
?>

<script>
    const headerAlertIcon = document.querySelector(".headerAlertIcon");
    const headerAlertPopup = document.querySelector("#headerAlertPopup");
    
    if(headerAlertIcon) {
        headerAlertIcon.addEventListener("click", ()=>{
            // alert("aaaa")
            headerAlertPopup.classList.toggle("show");
        });
    }
</script>