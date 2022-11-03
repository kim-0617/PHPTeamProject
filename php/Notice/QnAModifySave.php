<?php
    header('Access-Control-Allow-Origin: *');
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<?php
    $myMemberID = $_SESSION['myMemberID'];
    $youName = $_SESSION['youName'];
    $QnAID = $_POST['QnAID'];
    $QnAtitle = $_POST['QnAWriteHeader'];
    $QnAContents = nl2br($_POST['QnAWriteDesc']);
    $QnACategory = $_POST['searchOption1'];
    $QnATag = $_POST['QnAWriteTag'];
    $regTime = time();

    $sql = "UPDATE myQnA SET QnATitle='$QnAtitle', QnAContents='$QnAContents', QnACategory='$QnACategory', QnATag='$QnATag' WHERE myQnAID=$QnAID and myMemberID=$myMemberID;";
    $result = $connect -> query($sql);

    Header("Location: http://kkk5993.dothome.co.kr/php/Notice/QnACate.php?category=$QnACategory");
?>