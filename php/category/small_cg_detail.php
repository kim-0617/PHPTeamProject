<?php
    header('Access-Control-Allow-Origin: *');
    include "../connect/connect.php";
    include "../connect/session.php";
    // include "../connect/sessionCheck.php";

    $categoryBig = $_GET['categoryBig'];
    $categorySmall = $_GET['categorySmall'];

    $categorySql = "SELECT * FROM myTips WHERE TipsCateBig = '$categoryBig' AND TipsCateSmall = '$categorySmall' ORDER BY myTipsID DESC ";
    $categoryResult = $connect -> query($categorySql);
    $categoryInfo = $categoryResult -> fetch_array(MYSQLI_ASSOC);
    $categoryCount = $categoryResult -> num_rows;

    // 댓글
    if(!isset($_SESSION['myMemberID'])) {
        $myMemberID = -1;
    }
    else {
        $myMemberID = $_SESSION['myMemberID'];
    }
    $youID = $_SESSION['youID'];
    $myTipsID = $_GET['myTipsID'];

    $commentSql = "SELECT * FROM myComment WHERE myTipsID = {$myTipsID} ORDER BY myCommentID DESC";
    $commentResult = $connect -> query($commentSql);
    $commentInfo = $commentResult -> fetch_array(MYSQLI_ASSOC);
?>  

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>small_cg_detail</title>
    <link rel="stylesheet" href="../../html/asset/css/style.css">
    <link rel="stylesheet" href="../../html/asset/css/small_cg_detail.css">

    <?php 
        include "../include/link.php";
    ?>
</head>

<body>
    <?php
        include "../include/header.php";
    ?>
    <!-- //header -->

    <main id="main">
        <section id="banner">
            <div class="banner__inner">
                <figure>
                    <img src="../../html/asset/img/bannerBee.png" alt="마스코트">
                </figure>

                <div class="banner__desc">
                    <span class="sub__title">TIPS</span>
                    <h2 class="main__title"><?=$categoryBig?></h2>
                    <p class="banner__info">
                        다양한 정보를 <br>
                        종류별로 모아놨습니다.
                    </p>
                </div>
            </div>
        </section>
        <!-- //banner -->

        <section id="subTitle">
            <nav>
                <ul>
                    <!-- <li><a data-name="핸드폰" href="http://kkk5993.dothome.co.kr/php/category/small_cg.php?categoryBig=<?=$categoryBig?>&categorySmall=핸드폰">핸드폰</a></li>
                    <li><a data-name="컴퓨터" href="http://kkk5993.dothome.co.kr/php/category/small_cg.php?categoryBig=<?=$categoryBig?>&categorySmall=컴퓨터">컴퓨터</a></li>
                    <li><a data-name="아이디어" href="http://kkk5993.dothome.co.kr/php/category/small_cg.php?categoryBig=<?=$categoryBig?>&categorySmall=아이디어">아이디어</a></li>
                    <li><a data-name="관리" href="http://kkk5993.dothome.co.kr/php/category/small_cg.php?categoryBig=<?=$categoryBig?>&categorySmall=관리">관리</a></li> -->
                </ul>
            </nav>
            <a href="#" class="prev"><span class="ir">이전</span></a>
            <a href="#" class="next"><span class="ir">다음</span></a>
        </section>
        <!-- //subTitle -->

<script>
    const SubTitle = document.querySelector("#subTitle nav ul");
    const health = ["건강", "민간요법", "약"];
    const electronics = ["수리", "중고", "관리", "분해"];
    const cleaning = ["실내", "실외", "세탁", "세차"];
    const hobby = ["운동", "등산", "뜨개질", "드로잉"];
    const lifeStyle = ["원예", "반려동물", "운세", "퀴즈"];
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
        let option = `
                    <li><a data-name="${categorySmall[i]}" href="http://kkk5993.dothome.co.kr/php/category/small_cg.php?categoryBig=<?=$categoryBig?>&categorySmall=${categorySmall[i]}">${categorySmall[i]}</a></li>
                    `;
        SubTitle.innerHTML += option;
        // categoryIconBox.append(option2);
    }
</script>

<script>
    // 카테고리 슬라이드 (살려줘!!!)
    const listWrap = document.querySelector("#subTitle");
    const list = document.querySelector("#subTitle nav ul");
    const prevBtn = document.querySelector("#subTitle .prev");
    const nextBtn = document.querySelector("#subTitle .next");
    let list2 = document.querySelector("#subTitle nav ul li");
    let listWidth = list2.offsetWidth;
    
    // 이전버튼
    prevBtn.addEventListener("click", Goprev);
    function Goprev(){
        // list.style.transition = "all 0.3s"
        listWrap.style.width = "calc(100% +" + listWidth + "px)";
        listWrap.style.overflow = "hidden";
        // list.style.opacity = "0"
        // list.style.transform = "translateX(-399px)"
        let cateClone = list.firstElementChild.cloneNode(true); //첫번째 카테고리 복사
        list.appendChild(cateClone); 
        list.firstElementChild.remove(); //첫번째 카테고리 삭제해버리기
        // list.style.transform = "translateX(-"+ listWidth + "px)";
        
        // setTimeout(() => {
        //     list.style.opacity = "1"
        //     list.style.transition = "none"
        //     list.style.transform = "translateX(0px)"
        // }, 400);
    }

    // 넥스트버튼
    nextBtn.addEventListener("click", Gonext);
    function Gonext(){
        listWrap.style.width = "calc(100% +" + listWidth + "px)";
        listWrap.style.overflow = "hidden";
        let cateClone = list.lastElementChild.cloneNode(true); // 마지막 카테고리 복사
        list.insertBefore(cateClone, list.firstChild); 
        
        
        // list.style.transform = "translateX(-"+ listWidth + "px)";
        
        list.lastElementChild.remove(); //첫번째 카테고리 삭제해버리기
    }
</script>
<script>
    const subTitList = document.querySelectorAll("#subTitle li");
    const subTitListA = document.querySelectorAll("#subTitle li a");

    subTitListA.forEach((e, i)=>{
        if(e.dataset.name =="<?=$categorySmall?>"){
            subTitList[i].classList.add("active")
        }else{
            subTitList[i].classList.remove("active")
        }
    });  
</script>

        <section id="view">
            <div class="view__inner container">
<?php
    $myTipsID = $_GET['myTipsID'];

    // 조회수 ++
    
    $sql = "UPDATE myTips SET TipsView = TipsView + 1 WHERE myTipsID = {$myTipsID}";
    $connect -> query($sql);
    $sql = "UPDATE myTips SET TipsView = 1 WHERE myTipsID = {$myTipsID} AND TipsView IS NULL";
    $connect -> query($sql);


    $sql = "SELECT t.myMemberID, t.TipsTitle, t.TipsContents, t.TipsCateBig, t.TipsLike, t.TipsHate, t.TipsCateSmall, t.regTime, t.TipsTag, m.youName FROM myTips t JOIN myMember m ON(m.myMemberID = t.myMemberID) WHERE t.myTipsID = {$myTipsID};";
    $result = $connect -> query($sql);

    if($result){
        $Tips = $result -> fetch_array(MYSQLI_ASSOC);
        
        $PicMyMemberID = $Tips['myMemberID'];
        $myPictureSql = "SELECT * FROM myMember WHERE myMemberID=$PicMyMemberID;";
        $picResult = $connect -> query($myPictureSql);
        $picInfo = $picResult -> fetch_array(MYSQLI_ASSOC);
        $mySrc = $picInfo['youImageFile'];
        if($mySrc === NULL) {
            $mySrc = "Noimg.jpg";
        }

        if($Tips['TipsTag']){

        }else{ $Tips['TipsTag'] = "# 해시태그가 없습니다(⊙x⊙;)";}
        ?>
                <div class="category">
                    <span class="bigCg"><?=$Tips['TipsCateBig']?>&nbsp;&nbsp;&gt;&nbsp;&nbsp;</span>
                    <span class="smallCg"> <?=$Tips['TipsCateSmall']?></span>
                </div>
                <h2><?=$Tips['TipsTitle']?></h2>
                <p class="author">
                    <img src="../../html/asset/img/profile/<?=$mySrc?>" alt="profile">
                    <?php
                        $myMemberID = $_SESSION['myMemberID'];
                        if(!$myMemberID) {
                            $myMemberID = -1;
                        }
                    ?>
                    <span class="<?=$myMemberID?>"><?=$Tips['youName']?></span> 
                    <span><?=date('Y-m-d H:i:s',$Tips['regTime']);?></span>
                </p>
<?php
    $img = "SELECT TipsImg FROM myTips WHERE TipsCateBig = '$categoryBig'  AND TipsCateSmall = '$categorySmall' AND myTipsID = '$myTipsID' ";
    $imgResult = $connect -> query($img);
    $imgInfo = $imgResult -> fetch_array(MYSQLI_ASSOC);
?>
                <div class="view__text">
                    <div class="view__desc">
                        <img id="preview-image" src="../../html/asset/img/category/<?php if($imgInfo['TipsImg']==''){ echo "Thumnail_basicimg.png";}else{echo $imgInfo['TipsImg'];}; ?>" alt="섬네일 이미지">
                        <?=$Tips['TipsContents']?>
                    </div>

                    <?php
                        $className = '';
                        $ddabongSql = "SELECT * FROM myDetailGood WHERE myMemberID=$myMemberID and myTipsID=$myTipsID";
                        $ddabongResult = $connect -> query($ddabongSql);
                        $ddabondCount = $ddabongResult -> num_rows;
                        if($ddabondCount !== 0) {
                            $className="ddabong";
                        }

                        $badSql = "SELECT * FROM myDetailBad WHERE myMemberID=$myMemberID and myTipsID=$myTipsID";
                        $badResult = $connect -> query($badSql);
                        $badCount = $badResult -> num_rows;
                        if($badCount !== 0) {
                            $className="bad";
                        }
                    ?>

                    <div class="view__hashtag"><?=$Tips['TipsTag']?></div>
                    <div class="recom">
                        <div class="good <?=$myTipsID?>">
                            <span class="ir">추천하기</span>
                            <div class="gCheck">
                                <img src="../../html/asset/img/star.png" alt="대체이미지">
                            </div>
                        </div>
                        <div class="bad <?=$myTipsID?>">
                            <span class="ir">비추하기</span>
                            <div class="bCheck">
                                <img src="../../html/asset/img/star.png" alt="대체이미지">
                            </div>
                        </div>
                    </div>

                    <?php
                        include "../include/112.php";
                    ?>

                    <div class="view__icon">
                        <div class="report">
                            <div class="rp"><span class="ir">신고하기</span></div>
                        </div>
                        <script>
                            document.querySelector('.report .rp').addEventListener('click', () => {
                                document.querySelector('#police__wrap').classList.add('show');
                            });

                            document.querySelector('.police__cancle').addEventListener('click', (e) => {
                                e.preventDefault();
                                document.querySelector('#police__wrap').classList.remove('show');
                            });

                            document.querySelector('#police__wrap form').addEventListener('submit', (e) => {
                                e.preventDefault();
                                reportChecking();
                                location.reload();
                            });

                            function reportChecking(id) {
                                let reason = '';
                                if($('#police__pokun').is(":checked")) {
                                    reason = 'police__pokun';
                                } 
                                else if($('#police__dobae').is(":checked")) {
                                    reason = 'police__dobae';
                                }
                                else if($('#police__galdng').is(":checked")) {
                                    reason = 'police__galdng';
                                }
                                else if($('#police__idsayoung').is(":checked")) {
                                    reason = 'police__idsayoung';
                                }
                                else if($('#police__gita').is(":checked")) {
                                    reason = 'police__gita';
                                }
                                let contents = $('#text-area').val();

                                $.ajax({
                                    type : "POST",
                                    url  : "reportChecking.php",
                                    data : {"reason" : reason, "contents" : contents, "tipsID" : <?=$_GET['myTipsID']?>},
                                    dataType : "json",
                                    success : function(data) {
                                        if(data.result === "good") {
                                            alert("신고 결과가 접수되었는데, 나중에 메일로 알려드릴게요");
                                            // alert(data.result);
                                        }
                                        else if (data.result === "dup") {
                                            alert("두번은 안돼요");
                                            // alert(data.result);
                                        }
                                        else {
                                            alert("신고실패;");
                                            // alert(data.result);
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
                        
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_inline_share_toolbox_q12q"></div>
                    </div>
                </div>

<?php }else {
    echo "IF문 출력 오류. 확인 요망";
} ?>
            </div>
        </section>
        <!-- //view -->

        <section id="comment">
            <div class="comment__inner container">
                <h3>댓글</h3>
                <article class="comment__view">
            <?php
                foreach($commentResult as $comment){ 
                // 이미지
                $commnetMyMemberID = $comment['myMemberID'];
                $imageSql = "SELECT * FROM myMember WHERE myMemberID=$commnetMyMemberID";
                $imageResult = $connect -> query($imageSql);
                $imageName = $imageResult -> fetch_array(MYSQLI_ASSOC);
                $youImageFile = $imageName['youImageFile'];
                if($youImageFile === NULL) {
                    $youImageFile = "Noimg.jpg";
                }    
            ?>
                    <div class="comment__wrap" id="Comment<?=$comment['myCommentID']?>">
                        <div class="comment__view__box">
                            <!-- <div class="comment__view__img">
                                <img src="../assets/img/icon_256.png" alt="dd">
                            </div> -->
                            <div class="comment__title clearfix">
                                <img src="../../html/asset/img/profile/<?=$youImageFile?>" alt="profile">
                                <h4 class="name"><?=$comment['commentName']?></h4>
                                <span class="date"><?=date('Y-m-d', $comment['regTime'])?></span>
                            </div>
                            <div class="comment__desc">
                                <?=$comment['commentMsg']?>    
                            </div>
                        </div>

                        <div class="comment__del clearfix">
                            <a href="#" class="comment__del__del">삭제</a>
                            <a href="#" class="comment__del__mod">수정</a>
                        </div>
                    </div>
            <?php } ?>

                    <!-- 댓글 수정/삭제 버튼 -->
                    <div class="comment__delete" style="display: none">
                        <label for="commentDeletePass" class="blind">비밀번호</label>
                        <input type="text" id="commentDeletePass" name="commentDeletePass" placeholder="삭제하려면 비밀번호를 입력해 주세요.">
                        <button id="commentDeleteCancel">취소</button>
                        <button id="commentDeleteButton">삭제</button>
                    </div>
                    <div class="comment__modify" style="display: none">
                        <label for="commentModify">수정 내용</label>
                        <input type="text" id="commentModify" name="commentModify">
                        <label for="commentModifyPass" class="blind">비밀번호</label>
                        <input type="text" id="commentModifyPass" name="commentModifyPass" placeholder="수정하려면 비밀번호를 입력해 주세요.">
                        <button id="commentModifyCancel">취소</button>
                        <button id="commentModifyButton">수정</button>
                    </div>

                    <div class="comment__write">
                        <div class="comment__write__msg">
                            <label for="commentWrite" class="blind">댓글 작성하기</label>
                            <textarea id="commentWrite" name="commentWrite" rows="5" placeholder="여러분들의 댓글을 입력하세요.. 악플은 NO"></textarea>
                        </div>
                        <div class="comment__write__info">
                            <label for="commentName" class="blind">이름</label>
                            <input type="hidden" id="commentName" name="commentName" placeholder="이름" value="<?=$youID?>">
                            <label for="commentPass" class="blind">비밀번호</label>
                            <input type="text" id="commentPass" name="commentPass" placeholder="비밀번호 입력">
                            <button type="submit" id="commentBtn">댓글 작성하기</button>
                        </div>
                    </div>
                </article>
                <!-- //commnet01 -->
            </div>
        </section>
        <!-- //comment -->

        <div class="comment__btn container">
<?php
    // $prevPage = $myTipsID - 1;
    // $nextPage = $myTipsID + 1;

    // if($prevPage == 0){
    //     echo "<div class='noPrev'>No Prev</div>";
    //     $prevPage = 1;
    // }
    // $sql = "SELECT myTipsID FROM myTips";
    // $CountSql = $connect -> query($sql);
    // $count = $CountSql -> num_rows;
    // if($nextPage > $count){
    //     echo "<div class='noNext'>No Next</div>";
    //     $prevPage = $count;

    // }
    $pageMove = array();
    $pgMove = "SELECT myTipsID FROM myTips WHERE TipsCateBig ='$categoryBig' AND TipsCateSmall='$categorySmall' ORDER BY myTipsID;";
    $pgMoveResult = $connect -> query($pgMove);
    $pageMoveCount = $pgMoveResult -> num_rows;
    $prevPage = 0;
    $nextPage = 0;
    // $pageMove .= $pgMove;
    for($i = 0; $i < $pageMoveCount; $i++){
        $pageMoveProp = $pgMoveResult -> fetch_array(MYSQLI_ASSOC);
        $pageMove[$i] = $pageMoveProp['myTipsID'];
    };
    for($j =0; $j<$pageMoveCount; $j++){
        if($pageMove[$j]==$myTipsID){
            if($j-1 >= 0 && $j+1 <$pageMoveCount){
                $prevPage = $pageMove[$j-1];
                $nextPage = $pageMove[$j+1];
                echo "<div class='prev__wrap'><a href='small_cg_detail.php?categoryBig={$categoryBig}&categorySmall={$categorySmall}&myTipsID={$prevPage}' class='prev'><span class='ir'>이전</span></a></div>";
                echo "<div class='list__wrap'><a href='small_cg.php?categoryBig={$categoryBig}&categorySmall={$categorySmall}&page=1' class='list'><span class='ir'>목록</span></a></div>";
                echo "<div class='next__wrap'><a href='small_cg_detail.php?categoryBig={$categoryBig}&categorySmall={$categorySmall}&myTipsID={$nextPage}' class='next'><span class='ir'>다음</span></a></div>";
            }else if($j-1 < 0 && $j+1 == $pageMoveCount){
                echo "<div class='noPrev'>No Prev</div>";
                echo "<div class='noNext'>No Next</div>";
                echo "<div class='prev__wrap'><a href='small_cg_detail.php?categoryBig={$categoryBig}&categorySmall={$categorySmall}&myTipsID={$prevPage}' class='prev'><span class='ir'>이전</span></a></div>";
                echo "<div class='list__wrap'><a href='small_cg.php?categoryBig={$categoryBig}&categorySmall={$categorySmall}&page=1' class='list'><span class='ir'>목록</span></a></div>";
                echo "<div class='next__wrap'><a href='small_cg_detail.php?categoryBig={$categoryBig}&categorySmall={$categorySmall}&myTipsID={$nextPage}' class='next'><span class='ir'>다음</span></a></div>";
            }else if($j-1 < 0){
                $nextPage = $pageMove[$j+1];
                echo "<div class='noPrev'>No Prev</div>";
                echo "<div class='prev__wrap'><a href='small_cg_detail.php?categoryBig={$categoryBig}&categorySmall={$categorySmall}&myTipsID={$prevPage}' class='prev'><span class='ir'>이전</span></a></div>";
                echo "<div class='list__wrap'><a href='small_cg.php?categoryBig={$categoryBig}&categorySmall={$categorySmall}&page=1' class='list'><span class='ir'>목록</span></a></div>";
                echo "<div class='next__wrap'><a href='small_cg_detail.php?categoryBig={$categoryBig}&categorySmall={$categorySmall}&myTipsID={$nextPage}' class='next'><span class='ir'>다음</span></a></div>";
            }else if($j+1 == $pageMoveCount){
                $prevPage = $pageMove[$j-1];
                echo "<div class='noNext'>No Next</div>";
                echo "<div class='prev__wrap'><a href='small_cg_detail.php?categoryBig={$categoryBig}&categorySmall={$categorySmall}&myTipsID={$prevPage}' class='prev'><span class='ir'>이전</span></a></div>";
                echo "<div class='list__wrap'><a href='small_cg.php?categoryBig={$categoryBig}&categorySmall={$categorySmall}&page=1' class='list'><span class='ir'>목록</span></a></div>";
                echo "<div class='next__wrap'><a href='small_cg_detail.php?categoryBig={$categoryBig}&categorySmall={$categorySmall}&myTipsID={$nextPage}' class='next'><span class='ir'>다음</span></a></div>";
            }
        }
    };
    // echo "<pre>";
    // print_r($pageMove) ;
    // echo "</pre>";
    // echo $nextPage;
    // echo $prevPage;

    
    // echo "<div class='prev__wrap'><a href='small_cg_detail.php?categoryBig={$categoryBig}&categorySmall={$categorySmall}&myTipsID={$prevPage}' class='prev'><span class='ir'>이전</span></a></div>";
    // echo "<div class='list__wrap'><a href='small_cg.php?categoryBig={$categoryBig}&categorySmall={$categorySmall}&page=1' class='list'><span class='ir'>목록</span></a></div>";
    // echo "<div class='next__wrap'><a href='small_cg_detail.php?categoryBig={$categoryBig}&categorySmall={$categorySmall}&myTipsID={$nextPage}' class='next'><span class='ir'>다음</span></a></div>";
?>
        </div>

        <!-- <aside id="ad">
            <img src="../../html/asset/img/ad01.jpg" alt="멘트문명">
            <img src="../../html/asset/img/ad02.jpg" alt="오렌지쥬스">
        </aside> -->
        <!-- //ad -->
    </main>
    <!-- //main -->
    <?php
        include "../include/footer.php";
    ?>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    // 좋아요 싫어요
    const goodBtn = document.querySelector('.recom .good');
    const badBtn = document.querySelector('.recom .bad');

    goodBtn.addEventListener('click', (e) => {
        goodChecking(e.target.className.split(' ')[1]);
        location.reload();
    });

    function goodChecking(id) {
        let tipID = Number(id);

        $.ajax({
            type : "POST",
            url  : "goodChecking.php",
            data : {"tipID" : tipID},
            dataType : "json",
            success : function(data) {
                if(data.result.includes("good")) {
                        alert(data.result.replace('good', ''));
                }
                else {
                    alert(data.result.replace('bad', ''));
                }
            },
            error : function(request, status, error) {
                console.log("request",request);
                console.log("status",status);
                console.log("error",error);
            }
        });
    }

    badBtn.addEventListener('click', (e) => {
        badChecking(e.target.className.split(' ')[1]);
        location.reload();
    });

    function badChecking(id) {
            let tipID = Number(id);

            $.ajax({
                type : "POST",
                url  : "badChecking.php",
                data : {"tipID" : tipID},
                dataType : "json",
                success : function(data) {
                    if(data.result.includes("good")) {
                        alert(data.result.replace('good', ''));
                    }
                    else {
                        alert(data.result.replace('bad', ''));
                    }
                },
                error : function(request, status, error) {
                    console.log("request",request);
                    console.log("status",status);
                    console.log("error",error);
                }
            });
        }

    // 누른거 처리
    if('<?=$className?>'== 'ddabong') {
        document.querySelector('.recom .gCheck').style.display = 'block';
    }
    else if('<?=$className?>' == 'bad') {
        document.querySelector('.recom .bCheck').style.display = 'block';
    }
</script>

<!-- 알림용 변수 선언 -->
<?php
    $sql = "SELECT * FROM myTips WHERE myTipsID = {$myTipsID}";
    $result = $connect -> query($sql);
    $alert = $result -> fetch_array(MYSQLI_ASSOC);
    $myTipsMemberID = $alert['myMemberID'];
    $myAlertMsg = "1";
    // echo "<script> alert('$myTipsMemberID');</script>";
?>

<!-- 댓글 스크립트 -->
<script>
    const commentName = $("#commentName");     // 댓글 이름
    const commentPass = $("#commentPass");     // 댓글 비밀번호
    const commentWrite = $("#commentWrite");   // 댓글 내용
    const commentModify = $("#commentModify"); // 댓글 수정 내용

    let commentID = "";

    // 댓글 삭제 버튼 클릭시
    $(".comment__del__del").click(function(e){
        e.preventDefault();
        $(".comment__delete").show();
        
        // 클릭한 ID값 가져오기
        commentID = $(this).parent().parent().attr('id');
    })
    // 댓글 삭제 버튼 --> 취소 버튼 클릭
    $("#commentDeleteCancel").click(function(){
        $(".comment__delete").hide();
    })

    // 댓글 삭제 버튼 --> 삭제 버튼 클릭
    $("#commentDeleteButton").click(function(){

        let number = commentID.replace(/[^0-9]/g, "");
        let myMemberID = <?=$myMemberID?>

        if($("#commentDeletePass").val() == ''){
            alert("댓글 작성시의 비밀번호를 적어주세요!");
            $("#commentDeletePass").focus();
        } else {
            $.ajax({
                url: "tipsCommentDelete.php",
                method: "POST",
                dataType: "json",
                data: {
                    "pass": $("#commentDeletePass").val(),
                    "commentID": number,
                    "myMemberID" : myMemberID,
                },
                success: function(data){
                    if(data.info === "good"){
                        alert("삭제완료");
                        location.reload();
                    }
                    else {
                        alert("비밀번호가 영아닌데요? 혹시 당신의 글이 아닌거 아니에요?");
                    }
                },
                error: function(request, status, error){
                    console.log("request" , request);
                    console.log("status" , status);
                    console.log("error" , error);
                }
            })
        }

    })

    // 댓글 수정 버튼 클릭시
    $(".comment__del__mod").click(function(e){
        e.preventDefault();
        
        $(".comment__modify").show();
        
        commentID = $(this).parent().parent().attr('id');
        commentModMsg = document.querySelector(`#${commentID} .comment__desc`);
        commentModify.val(commentModMsg.innerText);
    })

    // 댓글 수정 버튼 --> 취소 버튼 클릭
    $("#commentModifyCancel").click(function(){
        $(".comment__modify").hide();
    })

    // 댓글 수정 버튼 --> 수정 버튼 클릭
    $("#commentModifyButton").click(function(){

        let number = commentID.replace(/[^0-9]/g, "");

        if($("#commentModify").val() == '' || $("#commentModifyPass").val() == ''){
            alert("수정 내용 및 비밀번호를 입력해주세요!");
            $("#commentModifyPass").focus();
        } else {
            $.ajax({
                url: "tipsCommentModify.php",
                method: "POST",
                dataType: "json",
                data: {
                    "pass": $("#commentModifyPass").val(),
                    "commentID": number,
                    "commentmsg": $("#commentModify").val(),
                    "myMemberID" : <?=$myMemberID?>
                },
                success: function(data){
                    if(data.info === "good"){
                        alert("수정완료!");
                        location.reload();
                    }
                    else {
                        alert("비밀번호가 영 아니네요~ ");
                    }
                },
                error: function(request, status, error){
                    console.log("request" , request);
                    console.log("status" , status);
                    console.log("error" , error);
                }
            })
        }
    })

    // 댓글 쓰기 버튼
    $("#commentBtn").click(function(){
        if($("#commentWrite").val() == ""){
            alert("댓글을 작성해 주세요.");
            $("#commentWrite").focus();
        } 
        else if($('#commentPass').val() === "") {
            alert("비밀번호를 입력해 주세요.");
            $("#commentPass").focus();
        }
        else {
            $.ajax({
                url: "tipsCommentWrite.php",
                method: "POST",
                dataType : "json",
                data: {
                    "myTipsID": <?=$myTipsID?>,
                    "name": commentName.val(),
                    "pass": commentPass.val(),
                    "msg": commentWrite.val(),
                    "myTipMemberID" : <?=$myTipsMemberID?>,
                    "myAlertMsg" : <?=$myAlertMsg?>,
                },
                success: function(data){
                    if(data.info === "nologin") {
                        alert("로그인도 안하고 댓글을 쓰시네요");
                        commentWrite.val('');
                        commentPass.val('');
                    }
                    else {
                        location.reload();
                    }
                },
                error: function(request, status, error){
                    console.log("request" , request);
                    console.log("status" , status);
                    console.log("error" , error);
                }
            })
        }
    })
</script>
</html>