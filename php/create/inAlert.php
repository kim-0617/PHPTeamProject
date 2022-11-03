<?php
    include "../connect/connect.php";
    
    // 배열에 정보 입력하기
    // $arrMyTipsID = array("1", "0", "2", "0", "0");
    // $arrMyAlertMsg = array("1", "0", "1", "0", "0");
    
    // $myTipsID = json_encode($arrMyTipsID);
    // $myAlertMsg = json_encode($arrMyAlertMsg);
    // $regTime = time();

    // $sql = "INSERT INTO myAlert(myMemberID, myTipsID, myAlertMsg, regTime) VALUES('1', '$myTipsID', '$myAlertMsg', '$regTime')";
    // $result = $connect -> query($sql);
    

    // 배열 출력하기
    $sql = "SELECT * FROM myAlert WHERE myAlertID = 3 ";
    $result = $connect -> query($sql);
    $Alert = $result -> fetch_array(MYSQLI_ASSOC);

    $myTipsID = json_decode($Alert['myTipsID']);
    $myAlertMsg = json_decode($Alert['myAlertMsg']);
    echo $myAlertMsg[0];

    // 배열 수정하기
    // $sql = "SELECT * FROM myAlert WHERE myAlertID = 3 ";
    // $result = $connect -> query($sql);
    // $Alert = $result -> fetch_array(MYSQLI_ASSOC);

    // $arrMyTipsID = json_decode($Alert['myTipsID']);
    // $arrMyTipsID[] = "5";

    // echo print_r($arrMyTipsID, true);
    // $myTipsID = json_encode($arrMyTipsID);
    // echo $arrMyTipsID;

    // $sql = "UPDATE myAlert SET myTipsID = '{$myTipsID}' WHERE myAlertID = 3 ";
    // $result = $connect -> query($sql);


    $myTipsID = 10;
    $myTipsMemberID = 3;
    $myAlertMsg = "1";
    $regTime = time();

    // 알림  추가
    $alertSql = "SELECT * FROM myAlert WHERE myMemberID = {$myTipsMemberID} ";
    $alertResult = $connect -> query($alertSql);
    // echo $alertResult -> num_rows;
    // echo "<pre>";
    // var_dump($alertResult);
    // echo "</pre>";
    
    if($alertResult -> num_rows){
        echo "ooooo";
        // 테이블이 있을 때 -> 수정
        // $Alert = $alertResult -> fetch_array(MYSQLI_ASSOC);
        // $arrMyTipsID = json_decode($Alert['myTipsID']);
        // $arrMyTipsID[] = "{$myTipsID}";
        // $arrMyAlertMsg = json_decode($Alert['myAlertMsg']);
        // $arrMyAlertMsg[] = "{$myAlertMsg}";
        
        // $myTipsID = json_encode($arrMyTipsID);
        // $myAlertMsg = json_encode($arrMyAlertMsg);
        
        // echo print_r($arrMyAlertMsg, true);
        // echo $myAlertMsg;

        // $alertSql = "UPDATE myAlert SET myTipsID = '{$myTipsID}', myAlertMsg = '{$myAlertMsg}', regTime = '{$regTime}' WHERE myMemberID = {$myTipsMemberID}";
        // $alertResult = $connect -> query($alertSql);
    } else {
        echo "xxxx";
        // 테이블이 없을 때 -> 추가
        // $arrMyTipsID = array("{$myTipsID}");
        // $arrMyAlertMsg = array("{$myAlertMsg}");
        
        // $myTipsID = json_encode($arrMyTipsID);
        // $myAlertMsg = json_encode($arrMyAlertMsg);

        // $alertSql = "INSERT INTO myAlert(myMemberID, myTipsID, myAlertMsg, regTime) VALUES('$myTipsMemberID', '$myTipsID', '$myAlertMsg', '$regTime')";
        // echo
        // $alertResult = $connect -> query($alertSql);
    }

?>