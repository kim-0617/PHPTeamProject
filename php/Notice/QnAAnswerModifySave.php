<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<?php
    $QnAID = $_POST['QnAID'];
    $replyID = $_POST['ReplyID'];
    $category = $_POST['category'];
    $QnAContents = nl2br($_POST['QnAWriteDesc']);
    $regTime = time();

    $sql = "UPDATE myReply SET  QnAReply='$QnAContents' WHERE myQnAID=$QnAID and myReplyID=$replyID;";
    $result = $connect -> query($sql);

    Header("Location: http://kkk5993.dothome.co.kr/php/Notice/QnACate.php?category=$category");
?>