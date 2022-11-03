<?php
    header('Access-Control-Allow-Origin: *');
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<?php
    $myMemberID = $_SESSION['myMemberID'];
    $QnAtitle = $_POST['QnAWriteHeader'];
    $QnAContents = nl2br($_POST['QnAWriteDesc']);
    $QnACategory = $_POST['searchOption1'];
    $QnATag = $_POST['QnAWriteTag'];
    $regTime = time();

    $sql = "INSERT INTO myQnA(myMemberID, QnAtitle, QnAContents, QnACategory, QnATag, regTime) VALUES($myMemberID, '$QnAtitle', '$QnAContents', '$QnACategory', '$QnATag', $regTime);";
    $result = $connect -> query($sql);
    Header("Location: http://kkk5993.dothome.co.kr/php/Notice/QnACate.php?category=$QnACategory");
?>