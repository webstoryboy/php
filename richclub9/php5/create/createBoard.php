<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE andBoard (";
    $sql .= "boardID int(20) unsigned NOT NULL AUTO_INCREMENT,";
    $sql .= "memberID int(20) unsigned NOT NULL,";
    $sql .= "boardTitle varchar(50) NOT NULL,";
    $sql .= "boardContent longtext NOT NULL,";
    $sql .= "boardView int(20) unsigned NOT NULL,";
    $sql .= "regTime int(15) unsigned NOT NULL,";
    $sql .= "PRIMARY KEY (boardID)) CHARSET=utf8";

    $result = $connect -> query($sql);

    if($result){
        echo "Create Board True";
    } else {
        echo "Create Board False";
    }
?>