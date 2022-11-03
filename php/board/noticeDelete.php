<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $myNoticeID = $_GET['myNoticeID'];
    $myMemberIDGet = $_GET['myMemberID'];
    $myNoticeID = $connect -> real_escape_string($myNoticeID);
    $myMemberID = $_SESSION['myMemberID']; // 현재 세션

    // $checkSql = "SELECT * FROM myNotice WHERE myMemberID=$myMemberIDGet";
    // $result = $connect -> query($checkSql);
    // $Info = $result -> fetch_array(MYSQLI_ASSOC);

    if($myMemberIDGet !== $myMemberID) {
        echo "<script>alert('당신의 글이 아닙니다!'); location.href='./notice.php';</script>";
        exit;
    }

    $sql = "DELETE FROM myNotice WHERE myNoticeID={$myNoticeID}";
    $connect -> query($sql);
?>

<script>
    location.href = "./notice.php";
</script>