<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
    include "../connect/connect.php";
    
    // 변수 설정
    $type = $_POST['type'];
    $sql = "SELECT youID FROM myMember ";
    
    if($type === "phoneCheck"){
        $youIDPhonePhone = $_POST['youPhone'];
        $youIDPhoneName = $connect -> real_escape_string(trim($_POST['youName']));
        $sql .= "WHERE youName = '$youIDPhoneName' AND youPhone = '$youIDPhonePhone';";
    }
    
    else if($type === "emailCheck") {
        $youIDEmailName = $connect -> real_escape_string(trim($_POST['youName']));
        $youIDEmailEmail = $_POST['youEmail'];
        $sql .= "WHERE youName = '$youIDEmailName' AND youEmail = '$youIDEmailEmail';";
    }
    
    $result = $connect -> query($sql);
    $info = $result -> fetch_array(MYSQLI_ASSOC);
    $jsonResult = "bad";
    
    if($result -> num_rows === 1) {
        $jsonResult = "good".$info['youID'];
    }
    echo json_encode(array("result" => $jsonResult));
?>