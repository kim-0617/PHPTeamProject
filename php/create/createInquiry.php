<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE myInquiry (";
    $sql .= "myInquiryID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "myMemberID int(10) unsigned NOT NULL,";
    $sql .= "inquiryTitle varchar(50) NOT NULL,";
    $sql .= "inquiryContents longtext NOT NULL,";
    $sql .= "inquiryCategory varchar(50) NOT NULL,";
    $sql .= "inquiryAuthor varchar(20) NOT NULL,";
    $sql .= "blogImgFile varchar(100) DEFAULT NULL,";
    $sql .= "blogImgSize varchar(100) DEFAULT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY(myInquiryID)";
    $sql .= ")charset=utf8;";

    $connect -> query($sql);
?>