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
    <title>QnA 페이지</title>
    <link rel="stylesheet" href="../../html/asset/css/style.css">
    <link rel="stylesheet" href="../../html/asset/css/QnA.css">

    <?php 
        include "../include/link.php";
    ?>
</head>

<body>
    <?php
        include "../include/header.php";
    ?>

    <main id="main" class="QnA">
        <div class="subMenu">
            <h2>QnA</h2>
            <hr>
            <nav>
                <?php
                    include "../include/QnAcategory.php";
                ?>
            </nav>
        </div>

        <section id="QnA__wrap">
            <div class="QnA__inner container">
                <div class="QnA__tab">
                    <h3 class="AnswerPlus active">추가 답변하기</h3>
                    <a href="QnAWrite.php" class="QnA__ask">나도 질문하기</a>
                </div>

                    <?php
                        if(isset($_GET['category'])){
                            $category = $_GET['category'];
                        } else {
                            $category = '건강';
                        }
                    ?>

                    <?php
                        if(isset($_GET['page'])){
                            $page = (int)$_GET['page'];
                            $nowPage = (int)$_GET['page'];
                        } else {
                            $page = 1;
                            $nowPage = 1;
                        }
                        $viewNum = 4;
                        $viewLimit = ($viewNum * $page) - $viewNum;

                        $sql = "SELECT * FROM myQnA WHERE QnACategory='$category' ORDER BY myQnAID DESC LIMIT {$viewLimit}, {$viewNum}";
                        $result = $connect -> query($sql);
                        if($result) {
                            $count = $result -> num_rows;
                            if($count > 0){
                                for($i = 1; $i <= $count; $i++) {
                                    $info = $result -> fetch_array(MYSQLI_ASSOC);
                                    $QnAID = $info['myQnAID'];
                                    $QnATitle = $info['QnATitle'];
                                    $QnAChoice = $info['QnAChoice'];
                                    $QnAAnswer = $info['QnAAnswer'];
                                    $QnAStar = $info['QnAStar'];
                                    $QnAGood = $info['QnAGood'];
                                    $QnAVeiw = $info['QnAVeiw'];
                                    $QnAregTime = $info['regTime'];
                                    $QnAMyMemberID = $info['myMemberID'];
                                    $isChoiced = $info['isChoiced'];
                                    $QnAContents = $info['QnAContents'];
                                    $QnATags = $info['QnATag'];

                                    $nameSql = "SELECT m.youName FROM myMember m JOIN myQnA q ON (q.myMemberID = m.myMemberID) WHERE myQnAID=$QnAID";
                                    $nameResult = $connect -> query($nameSql);
                                    $nameInfo = $nameResult -> fetch_array(MYSQLI_ASSOC);


                                    echo "<article class='cont'>";
                                    echo "<div class='accept $isChoiced'>1</div>";
                                    echo "<h4 class='QnA__title'><a href='#'>$QnATitle</a></h4>";
                                    echo "<div class='icon'>
                                            <a href='#' class='AnserNum'>$QnAAnswer</span></a>
                                            <a href='#' class='star active $QnAID'>$QnAStar</span></a>
                                            <a href='#' class='like active $QnAID'>$QnAGood</a>
                                            <a href='QnAAnswer.php?QnAID=$QnAID&QnACategory=$category&myMemberID=$QnAMyMemberID' class='answer'>답변하기</a>
                                        </div>";
                                    echo "<div class='QnA__date'>".date('Y-m-d', $QnAregTime)."</div>";

                                    $myMemberID = $_SESSION['myMemberID'];
                                    $second_sql = "SELECT r.myMemberID,r.youName,r.myReplyID,r.QnAReply, r.great, r.regTime,r.myQnAID FROM myReply r JOIN myQnA q ON (r.myQnAID = q.myQnAID) WHERE r.myQnAID=$QnAID and r.great='no' ORDER BY r.regTime DESC;";
                                    $second_result = $connect -> query($second_sql);

                                    echo "<div class='cont__wrap'>";
                                    echo "<div class='QnA__cont contents'>";
                                    if($QnAMyMemberID === $_SESSION['myMemberID']) {
                                        echo "<a href='QnAModify.php?QnAID=$QnAID'>질문 수정</a>";
                                        echo "<a class='delete $QnAID'>질문 삭제</a>";
                                    }
                                    $author = $nameInfo['youName'];
                                    echo "<div class='contents__title'>질문자 '$author' 의 질문</div>";
                                    echo "<div class='contents__desc'>$QnAContents</div>";
                                    echo "<div class='contents__tag'>$QnATags</div>";
                                    echo "</div>";

                                    if($isChoiced === 'yes') {
                                        $great_sql = "SELECT r.youName,r.myReplyID,r.QnAReply, r.great, r.regTime,r.myQnAID FROM myReply r JOIN myQnA q ON (r.myQnAID = q.myQnAID) WHERE r.myQnAID=$QnAID and r.great='yes' ORDER BY r.regTime DESC;";
                                        $great_result = $connect -> query($great_sql);
                                        $great_info = $great_result -> fetch_array(MYSQLI_ASSOC);

                                        $myQnAID = $great_info['myQnAID'];
                                        $myReplyID = $great_info['myReplyID'];
                                        $great = $great_info['great'];
                                        $greatAuthor = $great_info['youName'];
                                        $greatReply = $great_info['QnAReply'];

                                        echo "<div class='QnA__cont'>";
                                        echo "<div class='reply $great'><span>'$greatAuthor'의답변 -> 채택된 글 입니다.</span></div>";
                                        echo "<div>$greatReply</div>";
                                        echo "</div>";
                                    }
                                    foreach($second_result as $reply) {
                                        $myQnAID = $reply['myQnAID'];
                                        $myReplyID = $reply['myReplyID'];
                                        $great = $reply['great'];
                    ?>
                                    <div class='QnA__cont'>
                    <?php
                                        if($QnAMyMemberID == $myMemberID && $isChoiced ==='no') {
                                            echo "<button class='myChoice $myMemberID $myQnAID $myReplyID'>채택하기</button>";
                                        }
                    ?>
                                        <div class='reply <?=$great?>'><span>'<?=$reply['youName']?>'의 답변</span></div>
                    <?php               
                                        if($myMemberID == $reply['myMemberID']) {
                    ?>
                                            <div class='answer__wrap'>
                                                <a href='QnAAnswerModify.php?QnAID=<?=$myQnAID?>&myReplyID=<?=$myReplyID?>&category=<?=$category?>' class='reply__modify'>수정하기</a>
                                                <a href='QnAAnswerDelete.php?QnAID=<?=$myQnAID?>&myReplyID=<?=$myReplyID?>' class='reply__delete'>삭제하기</a>
                                            </div>
                    <?php
                                        }
                    ?>
                                        <div><?=$reply['QnAReply']?></div>
                                    </div>
                    <?php
                                    }
                                    echo "</div>";
                                    echo "</article>";
                            } 
                    ?>
                                        
                    <?php
                        }
                            } 
                            else {
                                echo "<div class='issue__title'>게시글 오류입니다. 관리자에게 문의하세요!</div>";
                            }
                    ?>
                </article>
            </div>
            <div class="qna__page">
                <ul>
            <?php
                $sql = "SELECT count(myQnAID) FROM myQnA WHERE QnACategory='$category';";
                $result = $connect -> query($sql);
                $boardCount = $result -> fetch_array(MYSQLI_ASSOC);
                $boardCount = $boardCount['count(myQnAID)'];
                
                // 총 페이지 개수
                $boardCount = ceil($boardCount/$viewNum);

                // 현재 페이지를 기준으로 보여주고 싶은 개수
                $pageCurrent = 3;
                $startPage = $page - $pageCurrent;
                $endPage = $page + $pageCurrent;
                
                // 처음 페이지 초기화
                if($startPage < 1) $startPage = 1;
                
                // 마지막 페이지 초기화
                if($endPage >= $boardCount) $endPage = $boardCount;
                
                // 이전 페이지, 처음 페이지
                if($page != 1){
                    $prevPage = $page - 1;
                    echo "<li><a href='QnACate.php?page=1&category={$category}' class='firstPage'></a></li>";
                    echo "<li><a href='QnACate.php?page={$prevPage}&category={$category}' class='prev'></a></li>";
                }
                
                // 페이지 넘버 표시
                for($i=$startPage; $i<=$endPage; $i++){
                    $active = "";
                    if($i == $page) $active = "active";
                    echo "<li class='{$active}'><a href='QnACate.php?page={$i}&category={$category}'>{$i}</a></li>";
                }
                
                // 다음 페이지, 마지막 페이지                                                                                                                           
                if($page != $endPage){
                    $nextPage = $page + 1;
                    echo "<li><a href='QnACate.php?page={$nextPage}&category={$category}' class='next'></a></li>";
                    echo "<li><a href='QnACate.php?page={$boardCount}&category={$category}' class='endPage'></a></li>";
                }
            ?>
                </ul>
            </div>
        </section>
        <!-- //QnA -->

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        // 채택 되었을 때 스타일 다르게
        const replies = document.querySelectorAll('.QnA__cont .reply');
        replies.forEach((reply) => {
            if(reply.classList.contains('yes')) {
                reply.style.color = "red";
            }
        });

        // delete 버튼
        const deleteBtns = document.querySelectorAll('a.delete');
        deleteBtns.forEach(deleteBtn => {
            deleteBtn.addEventListener('click', e => {
            let className = e.target.className.split(' ')[1];
            e.preventDefault();
                if(!confirm("정말 삭제하시겠습니까?")) {
                    e.preventDefault();
                    alert("잘생각했다.");
                }
                else {
                    location.href = `QnADelete.php?QnAID=${className}`;
                }
            });
        })
        

        // active 
        const lis = document.querySelectorAll('.subMenu ul li');
        lis.forEach((li) => {
            if(li.innerText == '<?=$category?>') {
                li.classList.add('active');
            }
        });

        // 채택 휘장
        const accepts = document.querySelectorAll('.accept');
        accepts.forEach((accept) => {
            if(accept.classList.contains('yes')) {
                accept.style.opacity = 1;
            }
        });

        // 제목 누르면 답변 보이게 하기
        const title = document.querySelectorAll('.QnA__title a');
        const cont = document.querySelectorAll('.cont__wrap');

        title.forEach((a, index) => {
            a.addEventListener('click', (e) => {
                e.preventDefault();
                cont[index].classList.toggle('show');
            });
        });

        // 따봉과 즐찾 누르게 하기
        const ddabongs = document.querySelectorAll('.like');
        const bookMarks = document.querySelectorAll('.star');

        ddabongs.forEach((ddabong) => {
            ddabong.addEventListener('click', e => {
                e.preventDefault();
                goodChecking(e.target.className.split(' ')[2]);
                location.reload();
            });
        });

        bookMarks.forEach((bookMark) => {
            bookMark.addEventListener('click', e => {
                e.preventDefault();
                starChecking(e.target.className.split(' ')[2]);
                location.reload();
            });
        });

        function goodChecking(id) {
            let qnaID = Number(id);

            $.ajax({
                type : "POST",
                url  : "goodChecking.php",
                data : {"QnAID" : qnaID},
                dataType : "json",
                success : function(data) {
                    if(data.result === "good") {
                        alert("👍");
                    }
                    else {
                        // alert(data.result);
                        alert("😱");
                    }
                },
                error : function(request, status, error) {
                    console.log("request",request);
                    console.log("status",status);
                    console.log("error",error);
                }
            });
        }

        function starChecking(id) {
            let qnaID = Number(id);

            $.ajax({
                type : "POST",
                url  : "starChecking.php",
                data : {"QnAID" : qnaID},
                dataType : "json",
                success : function(data) {
                    if(data.result === "good") {
                        alert("⚡");
                    }
                    else {
                        alert("😱");
                    }
                },
                error : function(request, status, error) {
                    console.log("request",request);
                    console.log("status",status);
                    console.log("error",error);
                }
            });
        }

        // 채택하기
        const choice = document.querySelectorAll('button.myChoice');
        choice.forEach((button) => {
            button.addEventListener('click', (e) => {
                let className = e.target.className.split(' ');
                choiceChecking(className[1], className[2], className[3]);
                location.reload();
            });
        });

        function choiceChecking(mid, qid, rid) {
            let memID = Number(mid);
            let qnaID = Number(qid);
            let replyID = Number(rid);

            $.ajax({
                type : "POST",
                url  : "choiceChecking.php",
                data : {"myMemberID" : memID, "myQnAID" : qnaID, "myReplyID" : replyID},
                dataType : "json",
                success : function(data) {
                    if(data.result === "good") {
                        alert("채택 성공");
                    }
                    else {
                        alert("😱");
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