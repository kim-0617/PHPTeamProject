<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE myMember (";
    $sql .= "myMemberID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "youID varchar(30) NOT NULL,";
    $sql .= "youBirth varchar(20) NOT NULL,";
    $sql .= "youName varchar(10) NOT NULL,";
    $sql .= "youPass varchar(255) NOT NULL,";
    $sql .= "youAddress varchar(255) NOT NULL,";
    $sql .= "youPhone varchar(20) NOT NULL,";
    $sql .= "youEmail varchar(40) NOT NULL,";
    $sql .= "youGender ENUM("남자","여자") NULL DEFAULT '남자',";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY(myMemberID)";
    $sql .= ")charset=utf8;";

    $connect -> query($sql);
?>