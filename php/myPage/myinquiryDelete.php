<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $id = $_GET['myInquiryID'];
    $sql = "DELETE FROM myInquiry WHERE myInquiryID=$id";
    $connect -> query($sql);

    echo "<script>history.back(1)</script>";
?>