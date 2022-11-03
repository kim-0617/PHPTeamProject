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
    <title>공지사항 작성하기</title>
    <link rel="stylesheet" href="../../html/asset/css/style.css">

    <?php 
        include "../include/link.php";
    ?>
</head>
<body>
    <?php
        include "../include/header.php";
    ?>

    <main id="main">
        <section id="boardWrite" class="container">
            <h2>공지사항 작성하기</h2>
            <div class="boardWrite_Wrap">
                <form action="./noticeWriteSave.php" method="post">
                    <fieldset>
                        <legend class="blind">대분류 / 소분류 카테고리 선택하기</legend>
                        <div>
                            <label for="boardWriteHeader">제목</label>
                            <input type="text" name="boardWriteHeader" id="boardWriteHeader" placeholder="제목을 입력하세요" required>
                        </div>
                        <div>
                            <label for="boardWriteDesc">본문</label>
                            <textarea name="boardWriteDesc" id="boardWriteDesc"></textarea>
                        </div>
                        <div class="Writebtn">
                            <button type="submit" class="btn1">작성</button>
                            <a href="../main/main.php" class="btn2">취소</a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </section>
    </main>
    
    <?php
        include "../include/footer.php";
    ?>

</body>
</html>