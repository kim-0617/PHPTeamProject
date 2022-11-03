<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE Good (";
    $sql .= "myGoodID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "goodCheck varchar(30) NOT NULL,";
    $sql .= "badCheck varchar(30) NOT NULL";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY(myMemberID)";
    $sql .= ")charset=utf8;";

    $connect -> query($sql);
?>