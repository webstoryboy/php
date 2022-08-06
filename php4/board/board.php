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
    <title>게시판</title>
    <?php 
        include "../include/style.php";
    ?>
    <style>
        .footer {
            background: #f5f5f5;
        }
    </style>
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
                <h3 class="section__title">강의 게시판</h3>
                <p class="section__desc">강의와 관련된 게시판입니다. 궁금한 점은 여기를 확인하세요!</p>
                <div class="board__inner">
                    <div class="board__search">
                        <form action="boardSearch.php" name="boardSearch" method="GET">
                            <fieldset>
                                <legend class="ir_so">게시판 검색 영역</legend>
                                <div>
                                    <input type="search" name="searchKeyword" class="search-form" placeholder="검색어를 입력하세요!" aria-label="search" required>
                                </div>
                                <div>
                                    <select name="searchOption" class="search-option">
                                        <option value="title">제목</option>
                                        <option value="content">내용</option>
                                        <option value="name">등록자</option>
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" class="search-btn">검색</button>
                                </div>
                                <div>
                                    <a href="boardWrite.php" class="search-btn black">글쓰기</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="board__table">
                        <table class="hover">
                            <colgroup>
                                <col style="width: 5%;">
                                <col>
                                <col style="width: 10%;">
                                <col style="width: 12%;">
                                <col style="width: 7%;">
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
<?php
    
    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }

    $pageView = 10;
    $pageLimit = ($pageView * $page) - $pageView;

    //LIMIT 0,  10 -> page1
    //LIMIT 10, 10 -> page2
    //LIMIT 20, 10 -> page3
    //LIMIT 30, 10 -> page4

    $sql = "SELECT b.boardID, b.boardTitle, m.youName, b.regTime, b.boardView FROM webBoard b JOIN webMember m ON(b.memberID = m.memberID) ORDER BY boardID DESC LIMIT {$pageLimit}, {$pageView}";
    $result = $connect -> query($sql);

    if($result){
        $count = $result -> num_rows;

        if($count > 0){
            for($i=0; $i<$count; $i++){
                $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);
                echo "<tr>";
                echo "<td>".$boardInfo['boardID']."</td>";
                echo "<td><a href='boardView.php?boardID={$boardInfo['boardID']}'>".$boardInfo['boardTitle']."</a></td>";
                echo "<td>".$boardInfo['youName']."</td>";
                echo "<td>".date('Y-m-d', $boardInfo['regTime'])."</td>";
                echo "<td>".$boardInfo['boardView']."</td>";
                echo "</tr>";
            }
        }
    }
?>
                            </tbody>
                        </table>
                    </div>
                    <div class="board__pages">
                        <ul>
<?php
    $sql = "SELECT count(boardID) FROM webBoard";
    $result = $connect -> query($sql);

    $boardCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardCount = $boardCount['count(boardID)'];

    //echo $boardCount;

    //총 페이지 갯수 300/10 == 30
    //총 페이지 갯수 302/10 == 31
    //총 페이지 갯수 309/10 == 31
    //총 페이지 갯수 305/10 == 31

    $boardCount = ceil($boardCount/$pageView);

    //현재 페이지를 기준으로 보여주고 싶은 갯수
    $pageCurrent = 5;
    $startPage = $page - $pageCurrent;
    $endPage = $page + $pageCurrent;

    //처음 페이지 초기화
    if($startPage < 1) $startPage = 1;

    //마지막 페이지 초기화
    if($endPage >= $boardCount) $endPage = $boardCount;

    //이전 페이지, 처음 페이지
    if($page != 1){
        $prevPage = $page - 1;
        echo "<li><a href='board.php?page={$prevPage}'>이전</a></li>";
        echo "<li><a href='board.php?page=1'>처음으로</a></li>";
    }

    //페이지 넘버 표시
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($i == $page) $active = "active";

        echo "<li class='{$active}'><a href='board.php?page={$i}'>{$i}</a></li>";
    }

    //다음 페이지, 마지막 페이지
    if($page != $endPage){
        $nextPage = $page + 1;
        echo "<li><a href='board.php?page={$nextPage}'>다음</a></li>";
        echo "<li><a href='board.php?page={$boardCount}'>마지막으로</a></li>";
    }
?>
                        </ul>
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