<?php
    include "../connect/connect.php";
    
    $youPass = $_POST['youPass'];
    $youPass = password_hash($youPass, PASSWORD_DEFAULT);
    $tempID = $_POST['mySessionID'];
    
    $sql = "UPDATE myMember SET youPass='$youPass' WHERE myMemberID='$tempID';";

    $result = $connect -> query($sql);
    $jsonResult = "good";

    echo json_encode(array("result" => $jsonResult));
?>