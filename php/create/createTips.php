<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE myTips (";
    $sql .= "myTipsID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "myMemberID int(10) unsigned NOT NULL,";
    $sql .= "TipsTitle varchar(50) NOT NULL,";
    $sql .= "TipsContents longtext NOT NULL,";
    $sql .= "TipsView int(10) NULL,";
    $sql .= "TipsLike int(10) NULL,";
    $sql .= "TipsHate int(10) NULL,";
    $sql .= "TipsCateBig varchar(50) NOT NULL,";
    $sql .= "TipsCateSmall varchar(50) NOT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY (myTipsID)";
    $sql .= ") charset=utf8;";

    $connect -> query($sql);
?>