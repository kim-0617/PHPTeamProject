<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    // 변수 설정
    $type = $_POST['type'];
    $youID = $_POST['youID'];
    $youName = $_POST['youName'];

    $sql = "SELECT myMemberID, youName, youID FROM myMember ";
    
    if($type === "emailCheck"){
        $youEmail = $_POST['youEmail'];
        $sql .= "WHERE youID = '$youID' and youName = '$youName' and youEmail = '$youEmail';";
    }
    
    if($type === "phoneCheck") {
        $youPhone = $_POST['youPhone'];
        $sql .= "WHERE youID = '$youID' and youName = '$youName' and youPhone = '$youPhone';";
    }

    $result = $connect -> query($sql);
    $info = $result -> fetch_array(MYSQLI_ASSOC);
    $jsonResult = "bad"; 

    if($result -> num_rows === 1) {
        $newPass = password_hash("tempPass".$info['myMemberID'], PASSWORD_DEFAULT); 
        $pwChange = "UPDATE myMember SET youPass ='$newPass' WHERE youID = '$youID';";
        $result = $connect -> query($pwChange);
        $jsonResult = "good"."tempPass".$info['myMemberID'];
    }

    echo json_encode(array("result" => $jsonResult));
?>