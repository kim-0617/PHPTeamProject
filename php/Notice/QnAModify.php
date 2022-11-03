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
    <title>QnA 작성하기</title>
    <link rel="stylesheet" href="../../html/asset/css/style.css">

    <?php 
        include "../include/link.php";
    ?>
</head>
<body>
    <?php
        include "../include/header.php";
    ?>

    <?php
        $QnAID = $_GET['QnAID'];
        $sql = "SELECT * FROM myQnA WHERE myQnAID=$QnAID;";
        $result = $connect -> query($sql);
        $info = $result -> fetch_array(MYSQLI_ASSOC);
        
        $category = $info['QnACategory'];
        $title = $info['QnATitle'];
        $content = $info['QnAContents'];
        $tag = $info['QnATag'];
    ?>

    <main id="main">
        <section id="boardWrite" class="container">
            <h2>질문 작성하기</h2>
            <div class="boardWrite_Wrap">
                <form action="QnAModifySave.php" method="post">
                    <fieldset>
                        <legend class="blind">질문 작성하기</legend>
                        <div>
                            <select name="searchOption1" id="searchOption1">
                                <option value="건강">건강</option>
                                <option value="전자기기">전자 기기</option>
                                <option value="청소">청소</option>
                                <option value="취미">취미</option>
                                <option value="라이프 스타일">라이프 스타일</option>
                                <option value="기타">기타</option>
                            </select>
                        </div>
                        <div>
                            <input type="hidden" value="<?=$QnAID?>" name="QnAID">
                        </div>
                        <div>
                            <label for="QnAWriteHeader">제목</label>
                            <input type="text" name="QnAWriteHeader" id="QnAWriteHeader" placeholder="제목을 입력하세요" value="<?=$title?>" required>
                        </div>
                        <div>
                            <label for="QnAWriteDesc">본문</label>
                            <textarea name="QnAWriteDesc" id="QnAWriteDesc"><?=$content?></textarea>
                        </div>
                        <div class="TagWrap">
                            <label for="QnAWriteTag" class="blind">#태그</label>
                            <input class="boardWriteTag" type="text" name="QnAWriteTag" id="QnAWriteTag" placeholder="태그는 #으로 시작해서 최대 3개까지 작성해주세요. (#잡스비 #멋저요)" value="<?=$tag?>" required>
                        </div>
                        <div class="Writebtn">
                            <button type="submit" class="btn1">작성</button>
                            <a href="#" class="btn2">취소</a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </section>
    </main>
    
    <?php
        include "../include/footer.php";
    ?>

    <script>
        const selectBox = document.querySelectorAll('#searchOption1 option');
        selectBox.forEach((opt) => {
            if(opt.value === "<?=$category?>") {
                opt.selected = true;
            }
        });
    </script>
</body>
</html>