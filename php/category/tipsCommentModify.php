<?php
    include "../connect/connect.php";

    $commentPass = $_POST['pass'];
    $commentmsg = $_POST["commentmsg"];
    $commentID = $_POST["commentID"];
    $myMemberID = $_POST["myMemberID"];

    $checkSql = "SELECT * FROM myComment WHERE myCommentID=$commentID and myMemberID=$myMemberID and commentPass='$commentPass'";
    $checkResult = $connect -> query($checkSql);
    $count = $checkResult -> num_rows;

    if($count) {
        $sql = "UPDATE myComment SET commentMsg = '{$commentmsg}', commentPass = '{$commentPass}' WHERE myCommentID = {$commentID}";
        $result = $connect -> query($sql);
        $jsonResult = "good";
    }
    else {
        $jsonResult = "bad";
    }

    echo json_encode(array("info" => $jsonResult));
?>