<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $boardID = $_GET['boardID'];
    $boardID = $connect -> real_escape_string($boardID);

    $sql = "DELETE FROM hwangBoard WHERE boardID = {$boardID}";
    $connect -> query($sql);
?>

<script>
    location.href = "board.php";
</script>