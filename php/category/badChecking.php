<?php
    header('Access-Control-Allow-Origin: *');
    include "../connect/connect.php";
    include "../connect/session.php";
    // include "../connect/sessionCheck.php";
?>

<?php
    if(isset($_SESSION['myMemberID'])) {
        $tipID = $_POST['tipID'];
        $myMemberID = $_SESSION['myMemberID'];
        $regTime = time();

        $justOne = "SELECT * FROM myDetailGood WHERE myMemberID=$myMemberID and myTipsID=$tipID";
        $justResult = $connect -> query($justOne);
        $justCount = $justResult -> num_rows;

        if($justCount !== 0) {
            $jsonResult = "good이러한 자잘한 기능을 시험하지 말아주세요 감사합니다.";
        }
        else {
            $findSql = "SELECT * FROM myDetailBad WHERE myMemberID=$myMemberID and myTipsID=$tipID;";
            $result = $connect -> query($findSql);
            $count = $result -> num_rows;
            $jsonResult = "bad잘생각하셨습니다.";

            if($count === 0) {
                $insertSql = "INSERT INTO myDetailBad(myMemberID, myTipsID, Bad, regTime) VALUES($myMemberID, $tipID, 1, $regTime);";
                $updateSql = "UPDATE myTips SET TipsHate=TipsHate+1 WHERE myTipsID=$tipID";
                $connect -> query($insertSql);
                $connect -> query($updateSql);
                $jsonResult = "good뭐가문제시죠?";
            }
            else {
                // 마이너스 방지
                $badSql = "SELECT * FROM myTips WHERE myTipsID=$tipID;";
                $badResult = $connect -> query($badSql);
                $badInfo = $badResult -> fetch_array(MYSQLI_ASSOC);
                $badCount = $badInfo['TipsHate'];

                if($badCount > 0) {
                    $updateSql2 = "UPDATE myTips SET TipsHate=TipsHate-1 WHERE myTipsID=$tipID";
                    $deleteSql = "DELETE FROM myDetailBad WHERE myTipsID=$tipID and myMemberID=$myMemberID";
                    $connect -> query($updateSql2);
                    $connect -> query($deleteSql);
                }
            }
        }
    }
    else {
        $jsonResult = "로그인을해주세요";
    }
    
    echo json_encode(array("result" => $jsonResult));
?>