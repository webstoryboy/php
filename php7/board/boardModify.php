<?php
    include '../connect/connect.php';
    include '../connect/session.php';
    include '../connect/sessionCheck.php';
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>

    <link rel="stylesheet" href="../assets/css/fonts.css">
    <link rel="stylesheet" href="../assets/css/var.css">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div id="wrap">
        <!-- header -->
        <header id="header">
            <?php
                include '../include/header.php';
            ?>
        </header>
        <!-- //header -->
        <main>
            <section id="mainContent">
                <h2 class="screen_out">메인 컨텐츠</h2>
 
                <article class="content-article">
                    <h3>수정하기</h3>
                    <p>제목과 내용을 수정할 수 있습니다.</p>
                    
                    <section class="boardWrite">
                        <form action="boardModifySave.php" name="boardWrite" method="post">
                            <fieldset>
                                <legend class="screen_out">게시판 작성 영역입니다.</legend>

                                <?php
                                    $boardID = $_GET['boardID'];

                                    $sql = "SELECT b.boardTitle, b.boardContent, b.boardView, m.youName, b.regTime FROM myBoard99 b JOIN myMember99 m ON (b.memberID = m.memberID) WHERE b.boardID = {$boardID}";
                                    $result = $connect -> query($sql);

                                    if( $result ){
                                        $info = $result -> fetch_array(MYSQLI_ASSOC);
                                        echo "<div style='display:none'><label for='boardID'>번호</label>";
                                        echo "<input type='text' name='boardID' id='boardID' class='title-text' value='".$_GET['boardID']."' />";
                                        echo "</div><div>";
                                        echo "<label for='boardTitle'>제목</label>";
                                        echo "<input type='text' name='boardTitle' id='boardTitle' class='title-text' value='".$info['boardTitle']."' />";
                                        echo "</div><div>";
                                        echo "<label for='boardContent'>내용</label>";
                                        echo "<textarea name='boardContent' id='boardContent' rows='13'>".$info['boardContent']."</textarea>";
                                        echo "</div><div class='mt20'>";
                                        echo "<label for='boardPass'>비밀번호</label>";
                                        echo "<input type='password' name='boardPass' id='boardPass' class='title-text' placeholder='로그인 비밀번호를 입력해주세요!' autocomplete='off' require />";
                                        echo "</div>";
                                    }
                                ?>

                                <!-- <div style="display: none">
                                    <label for="boardID">번호</label>
                                    <input type="text" name="boardID" id="boardID" class="title-text" />
                                </div>
                                <div>
                                    <label for="boardTitle">제목</label>
                                    <input type="text" name="boardTitle" id="boardTitle" class="title-text" />
                                </div>
                                <div>
                                    <label for="boardContent">내용</label>
                                    <textarea name="boardContent" id="boardContent" rows="13" class="title-text"></textarea>
                                </div>
                                <div class="mt20">
                                    <label for="boardPass">비밀번호</label>
                                    <input type="password" name="boardPass" id="boardPass" class="title-text" placeholder="로그인 비밀번호를 입력해주세요!!" autocomplete='off' require />
                                </div> -->
                            </fieldset>
                            <button class="writeBoardBtn" type="submit" value="저장하기">저장하기</button>
                        </form>
                    </section>
                </article>
            </section>
        </main>
        <!-- footer -->
        <footer id="footer">
            <?php
                include '../include/footer.php';
            ?>
        </footer>
        <!-- //footer -->
    </div>
    
</body>
</html>