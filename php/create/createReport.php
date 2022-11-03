<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE myReport (";
    $sql .= "myReportID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "myMemberID int(10) unsigned NOT NULL,";
    $sql .= "myTipsID int(10) NULL DEFAULT 0,";
    $sql .= "reportTitle varchar(255) NOT NULL,";
    $sql .= "reportCont longtext NOT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY(myReportID)";
    $sql .= ")charset=utf8;";

    $connect -> query($sql);
?>