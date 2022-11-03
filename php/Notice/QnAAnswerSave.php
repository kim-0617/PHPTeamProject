<?php
    header('Access-Control-Allow-Origin: *');
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<?php
    $myMemberID = $_SESSION['myMemberID'];
    $QnAID = $_POST['QnAID'];
    $youName = $_SESSION['youName'];
    $QnAReply = $_POST['QnAWriteDesc'];
    $regTime = time();

    $category = $_POST['QnACategory'];

    $sql = "INSERT INTO myReply(myMemberID, myQnAID, youName, QnAReply, regTime) VALUES($myMemberID, $QnAID, '$youName', '$QnAReply', $regTime);";
    $result = $connect -> query($sql);

    $answerPlusSql = "UPDATE myQnA SET QnAAnswer=QnAAnswer+1 WHERE myQnAID=$QnAID";
    $answerPlusResult = $connect -> query($answerPlusSql);

    // 알림 보내기
    $qnaSql = "SELECT * FROM myQnA WHERE myQnAID = {$QnAID}";
    $qnaResult = $connect -> query($qnaSql);
    $qna = $qnaResult -> fetch_array(MYSQLI_ASSOC);

    $qnaMyMemberID = $qna['myMemberID'];

    $alertSql = "SELECT * FROM myAlert WHERE myMemberID = {$qnaMyMemberID} ";
    $alertResult = $connect -> query($alertSql);
    // echo "{$alertResult -> num_rows}";
    if($alertResult -> num_rows){
        // echo "<script>alert('aaa');</script>";
        // echo "<script>alert('".count($myAlertMsg)."');</script>";
        // 테이블이 있을 때 -> 수정
        $Alert = $alertResult -> fetch_array(MYSQLI_ASSOC);
    
        $arrMyTipsID = json_decode($Alert['myTipsID']);
        $arrMyTipsID[] = "{$QnAID}";
        $arrMyAlertMsg = json_decode($Alert['myAlertMsg']);
        $arrMyAlertMsg[] = "0";
        $arrRegTime = json_decode($Alert['regTime']);
        $arrRegTime[] = "{$regTime}";
        // echo print_r($arrMyAlertMsg, true);
    
        $myTipsID2 = json_encode($arrMyTipsID);
        $myAlertMsg = json_encode($arrMyAlertMsg);
        $regTime2 = json_encode($arrRegTime);
        // echo $myAlertMsg;
    
        $myAlertSql = "UPDATE myAlert SET myTipsID = '{$myTipsID2}', myAlertMsg = '{$myAlertMsg}', regTime = '{$regTime2}' WHERE myMemberID = {$qnaMyMemberID}";
        $myAlertResult = $connect -> query($myAlertSql);
    } else {
        // echo "<script>alert('bbb');</script>";
        // 테이블이 없을 때 -> 추가
        $arrMyTipsID = array("{$QnAID}");
        $arrMyAlertMsg = array("0");
        $arrRegTime = array("{$regTime}");
        
        $myTipsID2 = json_encode($arrMyTipsID);
        $myAlertMsg = json_encode($arrMyAlertMsg);
        $regTime2 = json_encode($arrRegTime);

        $alertSql = "INSERT INTO myAlert(myMemberID, myTipsID, myAlertMsg, regTime) VALUES('$qnaMyMemberID', '$myTipsID2', '$myAlertMsg', '$regTime2')";
        $alertResult = $connect -> query($alertSql);
    }

    Header("Location: http://kkk5993.dothome.co.kr/php/Notice/QnACate.php?category=$category");
?>