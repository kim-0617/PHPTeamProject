<?php
    if(!isset($_SESSION['myMemberID'])) {
        echo "<script>alert('로그인이 필요한 서비스네요?');</script>";
        echo "<script>history.back(1);</script>";
    } 
?>