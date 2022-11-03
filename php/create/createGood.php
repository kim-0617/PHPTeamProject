<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE myGood (";
    $sql .= "myGoodID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "myMemberID int(10) unsigned NOT NULL,";
    $sql .= "myQnAID int(10) NULL DEFAULT 0,";
    $sql .= "Good int(10) NULL DEFAULT 0,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY(myGoodID)";
    $sql .= ")charset=utf8;";

    $connect -> query($sql);
?>