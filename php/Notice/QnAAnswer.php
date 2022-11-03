<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $myCheck = $_GET['myMemberID'];
    $myMemberID = $_SESSION['myMemberID'];
    if($myCheck === $myMemberID) {
        echo "<script>alert('알면 왜 질문했어?');</script>";
        echo "<script>location.href='http://kkk5993.dothome.co.kr/php/Notice/QnACate.php';</script>";
        exit;
    }
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
        $QnAID = $_GET['QnAID'];
        $QnACategory = $_GET['QnACategory'];
    ?>

    <main id="main">
        <section id="boardWrite" class="container">
            <h2>답변하기</h2>
            <div class="boardWrite_Wrap">
                <form action="QnAAnswerSave.php" method="post">
                    <fieldset>
                        <legend class="blind">질문 작성하기</legend>
                        <div>
                            <label for="QnAWriteDesc">멋진 답변 부탁헙니다.</label>
                            <textarea name="QnAWriteDesc" id="QnAWriteDesc"></textarea>
                        </div>
                        <div>
                            <input type="hidden" value="<?=$QnAID?>" name='QnAID'>
                        </div>
                        <div>
                            <input type="hidden" value="<?=$QnACategory?>" name='QnACategory'>
                        </div>
                        <div class="Writebtn">
                            <button type="submit" class="btn1">작성</button>
                            <a href="http://kkk5993.dothome.co.kr/php/Notice/QnACate.php" class="btn2">취소</a>
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