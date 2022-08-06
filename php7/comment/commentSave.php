<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include "../connect/connect.php";

        $youName = $_POST['youName'];
        $youText = $_POST['youText'];
        $regTime = time();

        // echo $youName;
        // echo $youText;

        $sql = "INSERT INTO myComment99(youName, youText, regTime) VALUES('$youName','$youText','$regTime')";

        $result = $connect -> query($sql);

        // if( $result ){
        //     echo "good";
        // } else {
        //     echo "bad";
        // }
    ?>

    <script>
        location.href = "../pages/comment.php#comment";
    </script>
</body>
</html>