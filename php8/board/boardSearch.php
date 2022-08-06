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
        <section id="mainContent">
            <h2 class="ir_so">메인 컨텐츠</h2>

            <article class="content-article">
                <h3>검색결과</h3>
<?php
    $searchKeyword = $_GET['searchKeyword'];
    $searchOption = $_GET['searchOption'];

    //echo $searchKeyword, $searchOption;

    if( $searchKeyword == '' || $searchKeyword == null ){
        echo "<p>검색어가 없습니다.</p>";
    }

    function msg($alert){
        echo "<p>총 ".$alert. "건이 검색되었습니다.</p>";
    }

    $searchKeyword = $connect -> real_escape_string($searchKeyword);
    $searchOption = $connect -> real_escape_string($searchOption);

    // $sql = "SELECT b.boardID, b.boardTitle, b.boardContent, b.boardView, m.youName, b.regTime FROM phpBoard b JOIN phpMember m ON (m.memberID = b.memberID) WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT 10";
    // $sql = "SELECT b.boardID, b.boardTitle, b.boardContent, b.boardView, m.youName, b.regTime FROM phpBoard b JOIN phpMember m ON (m.memberID = b.memberID) WHERE b.boardContent LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT 10";
    // $sql = "SELECT b.boardID, b.boardTitle, b.boardContent, b.boardView, m.youName, b.regTime FROM phpBoard b JOIN phpMember m ON (m.memberID = b.memberID) WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT 10";

    $sql = "SELECT b.boardID, b.boardTitle, b.boardContent, b.boardView, m.youName, b.regTime FROM phpBoard b JOIN phpMember m ON (m.memberID = b.memberID) ";

    switch($searchOption){
        case 'title':
            $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT 10";
            break;
        case 'content':
            $sql .= "WHERE b.boardContent LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT 10";
            break;
        case 'name':
            $sql .= "WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT 10";
            break;
    }

    //echo $sql;
    $result = $connect -> query($sql);

    if($result){
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
<?php
    if($result){
        $count = $result -> num_rows;
        
        if( $count > 0 ){
            for( $i=1; $i<=$count; $i++ ){
                $info = $result -> fetch_array(MYSQLI_ASSOC);
                echo "<tr>";
                echo "<td>".$info['boardID']."</td>";
                echo "<td class='left'><a href='boardView.php?boardID={$info['boardID']}'>".$info['boardTitle']."</a></td>";
                echo "<td>".$info['youName']."</td>";
                echo "<td>".date('Y-m-d', $info['regTime'])."</td>";
                echo "<td>".$info['boardView']."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>게시글이 없습니다.</td></tr>";
        }
    }
?>
                                <!-- <tr>
                                    <td>10</td>
                                    <td class="left"><a href="boardView.html">면접이 어려워요~ 면접 잘 보는 법 알려주세요!!</a></td>
                                    <td>웹쓰</td>
                                    <td>2021.09.01</td>
                                    <td>55</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                    <!-- <div class="board-page">
                        <ul>
                            <li><a href="#">처음으로</a></li>
                            <li><a href="#">처음</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                            <li><a href="#">7</a></li>
                            <li><a href="#">다음</a></li>
                            <li><a href="#">마직막으로</a></li>
                        </ul>
                    </div> -->
                </section>
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