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

        $justOne = "SELECT * FROM myDetailBad WHERE myMemberID=$myMemberID and myTipsID=$tipID";
        $justResult = $connect -> query($justOne);
        $justCount = $justResult -> num_rows;

        if($justCount !== 0) {
            $jsonResult = "good이러한 자잘한 기능을 시험하지 말아주세요 감사합니다.";
        }
        else {
            $findSql = "SELECT * FROM myDetailGood WHERE myMemberID=$myMemberID and myTipsID=$tipID;";
            $result = $connect -> query($findSql);
            $count = $result -> num_rows;
            $jsonResult = "bad왜취소해?";
    
            if($count === 0) {
                $insertSql = "INSERT INTO myDetailGood(myMemberID, myTipsID, DetailGood, regTime) VALUES($myMemberID, $tipID, 1, $regTime);";
                $updateSql = "UPDATE myTips SET TipsLike=TipsLike+1 WHERE myTipsID=$tipID";
                $connect -> query($insertSql);
                $connect -> query($updateSql);
                $jsonResult = "good그렇지";
            }
            else {
                // 마이너스 방지
                $GoodSql = "SELECT * FROM myTips WHERE myTipsID=$tipID;";
                $GoodResult = $connect -> query($GoodSql);
                $GoodInfo = $GoodResult -> fetch_array(MYSQLI_ASSOC);
                $GoodCount = $GoodInfo['TipsLike'];
    
                if($GoodCount > 0) {
                    $updateSql2 = "UPDATE myTips SET TipsLike=TipsLike-1 WHERE myTipsID=$tipID";
                    $deleteSql = "DELETE FROM myDetailGood WHERE myTipsID=$tipID and myMemberID=$myMemberID";
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