<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP class</title>

    <?php
        include "../include/link.php";
    ?>
</head>
<body>
    <div id="skip">
        <a href="#main">컨텐츠 바로가기</a>
        <a href="#footer">푸터 바로가기</a>
    </div>
    <!-- //skip -->

    <?php
        include "../include/header.php";
    ?>
    <!-- //header -->

    <main id="main">
        <section id="mainContent" class="gray">
            <h2 class="ir_so">메인 컨텐츠</h2>
            
            <article class="content-article">
                <div class="member-form">
                    <h3>문의하기</h3>
                    <p>메일이 잘 전송되었습니다. 조만간 연락드리겠습니다.</p>
                </div>
            </article>
        </section>
    </main>
    <!-- //header -->

    <?php
        include "../include/footer.php";
    ?>
    <!-- //header -->
</body>
</html>