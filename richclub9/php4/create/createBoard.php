<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE webBoard (";
    $sql .= "boardID int(10) unsigned auto_increment,";
    $sql .= "memberID int(10) unsigned NOT NULL,";
    $sql .= "boardTitle varchar(50) NOT NULL,";
    $sql .= "boardContents longtext NOT NULL,";
    $sql .= "boardView int(10) NOT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY (boardID)";
    $sql .= ") charset=utf8;";

    $connect -> query($sql);
?>