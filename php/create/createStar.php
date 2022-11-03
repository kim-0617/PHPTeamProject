<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE myStar (";
    $sql .= "myStarID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "myMemberID int(10) unsigned NOT NULL,";
    $sql .= "myQnAID int(10) NULL DEFAULT 0,";;
    $sql .= "star varchar(30) NOT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY(myStarID)";
    $sql .= ")charset=utf8;";

    $connect -> query($sql);
?>