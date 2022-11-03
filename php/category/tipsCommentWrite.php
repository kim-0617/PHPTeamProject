<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $myMemberID = $_SESSION['myMemberID'];
    if($myMemberID) {
        $myTipsID = $_POST['myTipsID'];
        $commentName = $_POST["name"];
        $commentPass = $_POST["pass"];
        $commentMsg = $_POST["msg"];
        $myTipsMemberID = $_POST["myTipMemberID"];
        $myAlertMsg = $_POST["myAlertMsg"];
        $regTime = time();

        $sql = "INSERT INTO myComment (myMemberID, myTipsID, commentName, commentMsg, commentPass, commentDelete, regTime) VALUES ('$myMemberID','$myTipsID','$commentName','$commentMsg','$commentPass','0','$regTime')";
        $result = $connect -> query($sql);

        // 알림  추가
        $alertSql = "SELECT * FROM myAlert WHERE myMemberID = {$myTipsMemberID} ";
        $alertResult = $connect -> query($alertSql);

        if($alertResult -> num_rows){
            // 테이블이 있을 때 -> 수정
            $Alert = $alertResult -> fetch_array(MYSQLI_ASSOC);
        
            $arrMyTipsID = json_decode($Alert['myTipsID']);
            $arrMyTipsID[] = "{$myTipsID}";
            $arrMyAlertMsg = json_decode($Alert['myAlertMsg']);
            $arrMyAlertMsg[] = "{$myAlertMsg}";
            $arrRegTime = json_decode($Alert['regTime']);
            $arrRegTime[] = "{$regTime}";
        
            $myTipsID2 = json_encode($arrMyTipsID);
            $myAlertMsg = json_encode($arrMyAlertMsg);
            $regTime2 = json_encode($arrRegTime);
        
            $alertSql = "UPDATE myAlert SET myTipsID = '{$myTipsID2}', myAlertMsg = '{$myAlertMsg}', regTime = '{$regTime2}' WHERE myMemberID = {$myTipsMemberID}";
            $alertResult = $connect -> query($alertSql);
        } else {
            // 테이블이 없을 때 -> 추가
            $arrMyTipsID = array("{$myTipsID}");
            $arrMyAlertMsg = array("{$myAlertMsg}");
            $arrRegTime = array("{$regTime}");
            
            $myTipsID2 = json_encode($arrMyTipsID);
            $myAlertMsg = json_encode($arrMyAlertMsg);
            $regTime2 = json_encode($arrRegTime);

            $alertSql = "INSERT INTO myAlert(myMemberID, myTipsID, myAlertMsg, regTime) VALUES('$myTipsMemberID', '$myTipsID2', '$myAlertMsg', '$regTime2')";
            $alertResult = $connect -> query($alertSql);
        }

        echo json_encode(array("info" => $myTipsID));
    }
    else {
        echo json_encode(array("info" => "nologin"));
    }
?>