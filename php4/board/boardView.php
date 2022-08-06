<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>

    <?php 
        include "../include/style.php";
    ?>
</head>
<body>
    <?php 
        include "../include/skip.php";
    ?>
    <!-- //skip --> 
    <?php 
        include "../include/header.php";
    ?>
    <!-- //header -->  

    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="board-type" class="section center mb100">
            <div class="container">
                <h3 class="section__title">게시글 보기</h3>
                <p class="section__desc">강의와 관련된 게시판입니다. 궁금한 점은 여기를 확인하세요!</p>
                <div class="board__inner">
                    <div class="board__table">
                        <table>
                            <colgroup>
                                <col style="width: 30%">
                                <col style="width: 70%">
                            </colgroup>
                            <tbody>
<?php
    $boardID = $_GET['boardID'];

    //echo $boardID;

    $sql = "SELECT b.boardTitle, m.youName, b.regTime, b.boardView, b.boardContents FROM webBoard b JOIN webMember m ON(m.memberID = b.memberID) WHERE b.boardID = {$boardID}";
    $result = $connect -> query($sql);

    if($result){
        $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);

        // echo "<pre>";
        // var_dump($boardInfo);
        // echo "</pre>";

        echo "<tr><th>제목</th><td class='left'>".$boardInfo['boardTitle']."</td></tr>";
        echo "<tr><th>글쓴이</th><td class='left'>".$boardInfo['youName']."</td></tr>";
        echo "<tr><th>등록일</th><td class='left'>".date('Y-m-d H:i', $boardInfo['regTime'])."</td></tr>";
        echo "<tr><th>조회수</th><td class='left'>".$boardInfo['boardView']."</td></tr>";
        echo "<tr><th>내용</th><td class='left height'>".$boardInfo['boardContents']."</td></tr>";
    }
?>
                            </tbody>
                        </table>
                    </div>
                    <div class="board__btn">
                        <a href="boardRemove.php?boardID=<?=$boardID?>" onclick="alert('정말 삭제할거니?')">삭제하기</a>
                        <a href="boardModify.php?boardID=<?=$boardID?>">수정하기</a>
                        <a href="board.php">목록보기</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php 
        include "../include/footer.php";
    ?>
    <!-- //footer -->  

</body>
</html>