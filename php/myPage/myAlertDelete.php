<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $myMemberID = $_SESSION['myMemberID'];
    $myAlertNum = $_GET['myAlertNum'];

    $myAlertSql = "SELECT * FROM myAlert WHERE myMemberID = '$myMemberID'";
    $myAlertResult = $connect -> query($myAlertSql);
    $myAlert = $myAlertResult -> fetch_array(MYSQLI_ASSOC);

    // 배열 수정하기 (수정 해야됨 splice)
    $arrMyTipsID = json_decode($myAlert['myTipsID']);
    array_splice($arrMyTipsID, $myAlertNum, 1);
    $arrMyAlertMsg = json_decode($myAlert['myAlertMsg']);
    array_splice($arrMyAlertMsg, $myAlertNum, 1);
    $arrRegTime = json_decode($myAlert['regTime']);
    array_splice($arrRegTime, $myAlertNum, 1);

    $myTipsID = json_encode($arrMyTipsID);
    $myAlertMsg = json_encode($arrMyAlertMsg);
    $regTime = json_encode($arrRegTime);

    $myAlertSql = "UPDATE myAlert SET myTipsID = '{$myTipsID}', myAlertMsg = '{$myAlertMsg}', regTime = '{$regTime}' WHERE myMemberID = {$myMemberID}";
    $myAlertResult = $connect -> query($myAlertSql);

    // echo print_r($arrMyTipsID, true);
    // $myTipsID = json_encode($arrMyTipsID);
    // echo $arrMyTipsID;

    // echo $arrMyTipsID;
?>
<script>
    window.history.back();
</script>