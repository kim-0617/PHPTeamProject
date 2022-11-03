<?php
    $prevPage = $_SERVER['HTTP_REFERER'];
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $QnAID = $_GET['QnAID'];
    $sql = "DELETE FROM myQnA WHERE myQnAID=$QnAID";
    $result = $connect -> query($sql);
    
    Header('location:'.$prevPage);
?>