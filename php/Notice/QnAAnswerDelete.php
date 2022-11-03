<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $prevPage = $_SERVER['HTTP_REFERER'];
    $QnAID = $_GET['QnAID'];
    $replyID = $_GET['myReplyID'];
    $sql = "DELETE FROM myReply WHERE myQnAID=$QnAID and myReplyID=$replyID";
    $result = $connect -> query($sql);

    $dSql = "UPDATE myQnA SET QnAAnswer=QnAAnswer-1 WHERE myQnAID=$QnAID";
    $dResult = $connect -> query($dSql);

    Header('location:'.$prevPage);
?>