<?php
    header('Access-Control-Allow-Origin: *');
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<?php
    $youPass = $_POST['youPass'];
    $myMemberID = $_SESSION['myMemberID'];

    $checkSql = "SELECT * FROM myMember WHERE myMemberID=$myMemberID;";
    $result = $connect -> query($checkSql);
    $checkPass = $result -> fetch_array(MYSQLI_ASSOC);
    
    $PWCheck= password_verify($youPass, $checkPass['youPass']);
    if($PWCheck == true) {
        // 삭제
        $deleteSql = "DELETE FROM myAlert WHERE myMemberID=$myMemberID";
        $connect -> query($deleteSql);
        $deleteSql = "DELETE FROM myComment WHERE myMemberID=$myMemberID";
        $connect -> query($deleteSql);
        $deleteSql = "DELETE FROM myDetailBad WHERE myMemberID=$myMemberID";
        $connect -> query($deleteSql);
        $deleteSql = "DELETE FROM myDetailGood WHERE myMemberID=$myMemberID";
        $connect -> query($deleteSql);
        $deleteSql = "DELETE FROM myGood WHERE myMemberID=$myMemberID";
        $connect -> query($deleteSql);
        $deleteSql = "DELETE FROM myInquiry WHERE myMemberID=$myMemberID";
        $connect -> query($deleteSql);
        $deleteSql = "DELETE FROM myNotice WHERE myMemberID=$myMemberID";
        $connect -> query($deleteSql);
        $deleteSql = "DELETE FROM myQnA WHERE myMemberID=$myMemberID";
        $connect -> query($deleteSql);
        $deleteSql = "DELETE FROM myReply WHERE myMemberID=$myMemberID";
        $connect -> query($deleteSql);
        $deleteSql = "DELETE FROM myReport WHERE myMemberID=$myMemberID";
        $connect -> query($deleteSql);
        $deleteSql = "DELETE FROM mystar WHERE myMemberID=$myMemberID";
        $connect -> query($deleteSql);
        $deleteSql = "DELETE FROM myTips WHERE myMemberID=$myMemberID";
        $connect -> query($deleteSql);
        $deleteSql = "DELETE FROM myMember WHERE myMemberID=$myMemberID";
        $connect -> query($deleteSql);
        $jsonResult = "good";

        unset($_SESSION['myMemberID']);
        unset($_SESSION['youID']);
        unset($_SESSION['youName']);
    }
    else {
        $jsonResult = "bad";
    }
    
    echo json_encode(array("result" => $jsonResult));
?>