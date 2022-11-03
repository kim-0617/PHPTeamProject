<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE myNotice (";
    $sql .= "myNoticeID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "myMemberID int(10) unsigned NOT NULL,";
    $sql .= "noticeTitle varchar(50) NOT NULL,";
    $sql .= "noticeContents longtext NOT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY (myNoticeID)";
    $sql .= ") charset=utf8;";

    $connect -> query($sql);
?>