<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $myMemberID = $_SESSION['myMemberID'];
    $myTipsID = $_GET['myTipsID'];

    $DTSql = "DELETE FROM myTips WHERE myTipsID = $myTipsID";
    $DTResult = $connect -> query($DTSql);

    echo "<script>window.history.back();</script>";
?>