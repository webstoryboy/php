<?php
    include "../connect/connect.php";

    $youName = $_POST['youName'];
    $youText = $_POST['youText'];
    $regTime = time();

    // echo $youName;
    // echo $youText;
    // echo $regTime;

    $sql = "INSERT INTO andComment(youName, youText, regTime) VALUES('$youName','$youText','$regTime')";

    $result = $connect -> query($sql);

    // if($result){
    //     echo "INSERT INTO true";
    // } else {
    //     echo "INSERT INTO false";
    // }
?>

<script>
    location.href = "../comment/comment.php#comment";
</script>