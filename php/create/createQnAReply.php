<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE myReply(";
    $sql .= "myReplyID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "myMemberID int(10) unsigned NOT NULL,";
    $sql .= "QnAReply longtext NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY(myReplyID)";
    $sql .= ")charset=utf8;";

    $connect -> query($sql);
?>