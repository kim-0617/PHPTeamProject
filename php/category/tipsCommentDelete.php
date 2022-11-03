<?php
    include "../connect/connect.php";

    $myMemberID = $_POST['myMemberID'];
    $commentPass = $_POST['pass'];
    $commentID = $_POST["commentID"];

    $checkSql = "SELECT * FROM myComment WHERE myCommentID=$commentID and myMemberID=$myMemberID and commentPass='$commentPass'";
    $checkResult = $connect -> query($checkSql);
    $count = $checkResult -> num_rows;
    if($count) {
        $sql = "DELETE FROM myComment WHERE myCommentID =$commentID";
        $connect -> query($sql);
        $jsonResult = "good";
    }
    else {
        $jsonResult = "bad";
    }
    
    echo json_encode(array("info" => $jsonResult));
?>