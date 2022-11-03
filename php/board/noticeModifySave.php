<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>공지사항 수정하기</title>

    <?php 
        include "../include/link.php";
    ?>
</head>
<body>
    <?php
        $myNoticeID = $_POST['myNoticeID'];
        $noticeTitle = $_POST['noticeTitle'];
        $noticeContents = nl2br($_POST['noticeContents']);
        $myMemberID = $_SESSION['myMemberID'];
        
        $noticeTitle = $connect -> real_escape_string($noticeTitle);
        $noticeContents = $connect -> real_escape_string($noticeContents);

        $sql = "SELECT myMemberID FROM myMember WHERE myMemberID = {$myMemberID};";
        $result = $connect -> query($sql);

        $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);

        if($memberInfo['myMemberID'] === $myMemberID) {
            $sql = "UPDATE myNotice SET noticeTitle = '$noticeTitle', noticeContents = '$noticeContents' WHERE myNoticeID={$myNoticeID}";
            $connect -> query($sql);
        }
    ?>

    <script>
        location.href = "./notice.php";
    </script>
</body>
</html>