<?php
    include "../connect/session.php";

    unset($_SESSION['memberID']);
    unset($_SESSION['youEmail']);
    unset($_SESSION['youName']);

    Header("Location: ../main/main.php");
?>

<!-- <script>
    location.href = "../main/main.php";
</script> -->