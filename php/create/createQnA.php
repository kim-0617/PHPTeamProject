<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE myQnA(";
    $sql .= "myQnAID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "myMemberID int(10) unsigned NOT NULL,";
    $sql .= "QnATitle varchar(30) NOT NULL,";
    $sql .= "QnAContents longtext NOT NULL,";
    $sql .= "QnAChoice int(10) NULL DEFAULT 0,";
    $sql .= "QnAReply int(10) NULL DEFAULT 0,";
    $sql .= "QnAStar int(10) NULL DEFAULT 0,";
    $sql .= "QnAGood int(10) NULL DEFAULT 0,";
    $sql .= "QnAVeiw int(10) NULL DEFAULT 0,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY(myQnAID)";
    $sql .= ")charset=utf8;";

    $connect -> query($sql);
?>