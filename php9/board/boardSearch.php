<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP class</title>

    <!-- link -->
    <?php
        include "../include/link.php";
    ?>
    <!-- //link -->
</head>
<body>
    <div id="skip">
        <a href="#main">컨텐츠 바로가기</a>
        <a href="#footer">푸터 바로가기</a>
    </div>
    <!-- //skip -->

    <!-- header -->
    <?php
        include "../include/header.php";
    ?>
    <!-- //header -->

    <main id="main">
        <section id="mainContent">
            <h2 class="ir_so">메인 컨텐츠</h2>

            <article class="content-article">
                <h3>검색 결과</h3>
<?php
    $searchKeyword = $_GET['searchKeyword'];
    $searchOption = $_GET['searchOption'];

    //echo $searchKeyword, $searchOption;

    if( $searchKeyword == '' || $searchOption == '' ){
        echo "<p>검색어가 없습니다.</p>";
    }

    function msg($alert){
        echo "<p>총 ".$alert." 건이 검색되었습니다.</p>";
    }

    $searchKeyword = $connect -> real_escape_string($searchKeyword);
    $searchOption = $connect -> real_escape_string($searchOption);

    // $sql = "SELECT b.boardID, b.boardTitle, b.boardContent, b.boardView, m.youName, b.regTime FROM webBoard b JOIN webMember m ON (m.memberID = b.memberID) WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT 10";
    // $sql = "SELECT b.boardID, b.boardTitle, b.boardContent, b.boardView, m.youName, b.regTime FROM webBoard b JOIN webMember m ON (m.memberID = b.memberID) WHERE b.boardContent LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT 10";
    // $sql = "SELECT b.boardID, b.boardTitle, b.boardContent, b.boardView, m.youName, b.regTime FROM webBoard b JOIN webMember m ON (m.memberID = b.memberID) WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT 10";
    
    $sql = "SELECT b.boardID, b.boardTitle, b.boardContent, m.youName, b.boardView, b.regTime FROM webBoard b JOIN webMember m ON(b.memberID = m.memberID) ";

    switch($searchOption){
        case 'title' :
            $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT 10";
            break;
        case 'content' :
            $sql .= "WHERE b.boardContent LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT 10";
            break;
        case 'name' :
            $sql .= "WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT 10";
            break;
    }

    $result = $connect -> query($sql);

    if( $result ){
        $count = $result -> num_rows;

        msg($count);
    }

?>
                <section class="section-board">
                    <h4 class="ir_so">게시판 컨텐츠</h4>
                    <div class="board-table">
                        <table>
                            <colgroup>
                                <col style="width: 5%" />
                                <col />
                                <col style="width: 10%" />
                                <col style="width: 12%" />
                                <col style="width: 7%" />
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>번호</th>
                                    <th>제목</th>
                                    <th>등록자</th>
                                    <th>등록일</th>
                                    <th>조회수</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </section>
            </article>
        </section>
    </main>
    <!-- //main -->

    <!-- footer -->
    <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->
</body>
</html>