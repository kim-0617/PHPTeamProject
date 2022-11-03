<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    // include "../connect/sessionCheck.php";
?>

<?php
    $boardTitle = $_POST['boardWriteHeader'];
    $boardContents = nl2br($_POST['boardWriteDesc']);

    $boardTitle = $connect -> real_escape_string($boardTitle);
    $boardContents = $connect -> real_escape_string($boardContents);
    $regTime = time();
    $myMemberID = $_SESSION['myMemberID'];

    $sql = "INSERT INTO myNotice(myMemberID, noticeTitle, noticeContents, regTime) VALUES('$myMemberID','$boardTitle','$boardContents','$regTime')";
    $connect -> query($sql);
?>

<script>
    location.href = "./notice.php";
</script>