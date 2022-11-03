<?php
    header('Access-Control-Allow-Origin: *');
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<?php
    if(isset($_SESSION['myMemberID'])) {
        $QnAID = $_POST['QnAID'];
        $myMemberID = $_SESSION['myMemberID'];
        $regTime = time();

        $findSql = "SELECT * FROM myGood WHERE myMemberID=$myMemberID and myQnAID=$QnAID;";
        $result = $connect -> query($findSql);
        $count = $result -> num_rows;
        $jsonResult = "bad"; 

        if($count === 0) {
            $insertSql = "INSERT INTO myGood(myMemberID, myQnAID, good, regTime) VALUES($myMemberID, $QnAID, 1, $regTime);";
            $updateSql = "UPDATE myQnA SET QnAGood=QnAGood+1 WHERE myQnAID=$QnAID";
            $selectSql = "SELECT * FROM myQnA WHERE myQnAID=$QnAID"; 
            $connect -> query($insertSql);
            $connect -> query($updateSql);
            $sResult = $connect -> query($selectSql);
            $info = $sResult -> fetch_array(MYSQLI_ASSOC);
            $jsonResult = "good";
        }
        else {
            // 마이너스 방지
            $GoodSql = "SELECT * FROM myQnA WHERE myQnAID=$QnAID;";
            $GoodResult = $connect -> query($GoodSql);
            $GoodInfo = $GoodResult -> fetch_array(MYSQLI_ASSOC);
            $GoodCount = $GoodInfo['QnAGood'];

            if($GoodCount > 0) {
                $updateSql2 = "UPDATE myQnA SET QnAGood=QnAGood-1 WHERE myQnAID=$QnAID";
                $deleteSql = "DELETE FROM myGood WHERE myQnAID=$QnAID and myMemberID=$myMemberID";
                $connect -> query($updateSql2);
                $connect -> query($deleteSql);
            }
        }
    }
    else {
        $jsonResult = "로그인을해주세요";
    }
    
    echo json_encode(array("result" => $jsonResult));
?>