<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE myAlert (";
    $sql .= "myAlertID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "myMemberID int(10) unsigned NOT NULL,";
    $sql .= "myTipsID longtext NOT NULL,";
    $sql .= "myAlertMsg longtext NOT NULL,";
    $sql .= "regTime longtext NOT NULL,";
    $sql .= "PRIMARY KEY (myAlertID)";
    $sql .= ") charset=utf8;";

    $connect -> query($sql);
?>