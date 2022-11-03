<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE myDetailBad (";
    $sql .= "myDetailBadID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "myMemberID int(10) unsigned NOT NULL,";
    $sql .= "myTipsID int(10) NULL DEFAULT 0,";
    $sql .= "Bad int(10) NULL DEFAULT 0,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY(myDetailBadID)";
    $sql .= ")charset=utf8;";

    $connect -> query($sql);
?>