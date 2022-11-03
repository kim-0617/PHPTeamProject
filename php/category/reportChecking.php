<?php
    header('Access-Control-Allow-Origin: *');
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<?php
    if(isset($_SESSION['myMemberID'])) {
        $myMemberID = $_SESSION['myMemberID'];
        $reason = $_POST['reason'];
        $contents = $_POST['contents'];
        $myTipsID = $_POST['tipsID'];
        $regTime = time();

        $checkSql = "SELECT * FROM myReport WHERE myMemberID=$myMemberID and myTipsID=$myTipsID";
        $checkResult = $connect -> query($checkSql);
        $checkCount = $checkResult -> num_rows;

        if($checkCount === 0) {
            $sql = "INSERT INTO myReport(myMemberID, myTipsID, reportTitle, reportCont, regTime) VALUES($myMemberID, $myTipsID, '$reason', '$contents', $regTime);";

            $connect -> query($sql);
            $jsonResult = "good";
        }
        else {
            $jsonResult = "dup";
        }
    }
    else {
        $jsonResult = "로그인을해주세요";
    }
    
    echo json_encode(array("result" => $jsonResult));
?>