<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $boardTitle = $_POST['boardTitle'];
    $boardContent = $_POST['boardContent'];

    $boardTitle = $connect -> real_escape_string($boardTitle);
    $boardContent = $connect -> real_escape_string($boardContent);
    $boardView = 1;
    $regTime = time();
    $memberID = $_SESSION['memberID'];

    //데이터 입력
    $sql = "INSERT INTO webBoard(memberID, boardTitle, boardContent, boardView, regTime) 
            VALUES('$memberID', '$boardTitle', '$boardContent', '$boardView', '$regTime')";

    $result = $connect -> query($sql);
?>

<script>
    location.href = "board.php";
</script>