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

        $findSql = "SELECT * FROM myStar WHERE myMemberID=$myMemberID and myQnAID=$QnAID;";
        $result = $connect -> query($findSql);
        $count = $result -> num_rows;
        $jsonResult = "bad"; 
        
        if($count === 0) {
            $insertSql = "INSERT INTO myStar(myMemberID, myQnAID, star, regTime) VALUES($myMemberID, $QnAID, 1, $regTime);";
            $updateSql = "UPDATE myQnA SET QnAStar=QnAStar+1 WHERE myQnAID=$QnAID";
            $connect -> query($insertSql);
            $connect -> query($updateSql);
            $jsonResult = "good";
        }
        else {
            // 마이너스 방지
            $starSql = "SELECT * FROM myQnA WHERE myQnAID=$QnAID;";
            $starResult = $connect -> query($starSql);
            $starInfo = $starResult -> fetch_array(MYSQLI_ASSOC);
            $starCount = $starInfo['QnAStar'];

            if($starCount > 0) {
                $updateSql2 = "UPDATE myQnA SET QnAStar=QnAStar-1 WHERE myQnAID=$QnAID";
                $deleteSql = "DELETE FROM myStar WHERE myQnAID=$QnAID and myMemberID=$myMemberID";
                $connect -> query($updateSql2);
                $connect -> query($deleteSql);
            }
        }
    }
    else {
        $jsonResult = "로그인해주세요!";
    }
    
    echo json_encode(array("result" => $jsonResult));
?>