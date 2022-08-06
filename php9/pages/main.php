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
                <?php
                    echo "<pre>";
                    var_dump($_SESSION);
                    echo "</pre>";
                ?>
                
                <h3>웹스토리보이 강의</h3>
                <p>웹디자이너, 웹퍼블리셔, 프론트앤드 개발자를 위한 포트폴리오 강의입니다.</p>
                <section class="section-card">
                    <h4 class="ir_so">카드 컨텐츠</h4>
                    <ul class="card-list">
                        <li>
                            <a href="#">
                                <img src="../assets/img/webstandard001.png" alt="dd">
                            </a>
                            <div class="item">
                                <strong>웹 표준 사이트 강의</strong>
                                <span>전 세계 연간 오픈소스 컴포넌트 다운로드 1.5조 건.<br>주요 IT기업의 95%가 오픈소스를 사용하고 있습니다.</span>
                                <span class="keyword">
                                    <span>#중급</span><span>#무료</span><span>#사이트</span>
                                </span>
                            </div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../assets/img/webstandard002.png" alt="dd">
                            </a>
                            <div class="item">
                                <strong>반응형 사이트 강의</strong>
                                <span>전 세계 연간 오픈소스 컴포넌트 다운로드 1.5조 건.<br>주요 IT기업의 95%가 오픈소스를 사용하고 있습니다.</span>
                                <span class="keyword">
                                    <span>#php</span><span>#mysql</span><span>#사이트</span>
                                </span>
                            </div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../assets/img/webstandard003.png" alt="dd">
                            </a>
                            <div class="item">
                                <strong>패랠랙스 사이트 강의</strong>
                                <span>전 세계 연간 오픈소스 컴포넌트 다운로드 1.5조 건.<br>주요 IT기업의 95%가 오픈소스를 사용하고 있습니다.</span>
                                <span class="keyword">
                                    <span>#초보</span><span>#mysql</span><span>#사이트</span>
                                </span>
                            </div>
                        </li>
                    </ul>
                </section>
            </article>
            <article class="flow-article">
                <h3 class="ir_so">웹스토리보이 강의 설명</h3>
                <section class="section-intro container">
                    <h4 class="ir_so">강의 소개</h4>
                    <div class="youtube-intro">
                        <div>
                            <iframe src="https://www.youtube.com/embed/1vb2A9cTb1I" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div>
                            <h5>포트폴리오는 어떻게 만들어야 할까?</h5>
                            <p>포트폴리오 만드는 과정을 인터뷰 합니다. 힘들었던 점과 좋았던 점 등을 얘기하며, 
                                포폴 과정의 노하우를 공유합니다.
                            </p>
                            <div class="interview">
                                <div class="icon">
                                    <a href="https://www.youtube.com/watch?v=gGlVkOiYRus&list=PL4UVBBIc6giLLag20uIwHlHsG83q3PYa5" target="_blank">
                                        <img src="../assets/img/svg-pizza.svg" alt="이정아">
                                        <span>#이정아</span>
                                    </a>
                                </div>
                                <div class="icon">
                                    <a href="https://www.youtube.com/watch?v=gGlVkOiYRus&list=PL4UVBBIc6giLLag20uIwHlHsG83q3PYa5" target="_blank">
                                        <img src="../assets/img/svg-vanilla-cupcake.svg" alt="서지현">
                                        <span>#서지현</span>
                                    </a>
                                </div> 
                                <div class="icon">
                                    <a href="https://www.youtube.com/watch?v=NWHIwQlptgM&list=PL4UVBBIc6giLLag20uIwHlHsG83q3PYa5&index=3" target="_blank">
                                        <img src="../assets/img/svg-pear.svg" alt="이소연">
                                        <span>#이소연</span>
                                    </a>
                                </div> 
                                <div class="icon">
                                    <a href="https://www.youtube.com/watch?v=NWHIwQlptgM&list=PL4UVBBIc6giLLag20uIwHlHsG83q3PYa5&index=3" target="_blank">
                                        <img src="../assets/img/svg-cherries.svg" alt="이다빈">
                                        <span>#이다빈</span>
                                    </a>
                                </div> 
                                <div class="icon">
                                    <a href="https://www.youtube.com/watch?v=NWHIwQlptgM&list=PL4UVBBIc6giLLag20uIwHlHsG83q3PYa5&index=3" target="_blank">
                                        <img src="../assets/img/svg-bread-egg.svg" alt="김민정">
                                        <span>#김민정</span>
                                    </a>
                                </div> 
                            </div>
                        </div>
                    </div>
                </section>
            </article>
            <article class="content-article content-sub">
                <h3>스크립트 강의</h3>
                <p>제이쿼리와 자바스크립트를 동시에 배우는 스크립트 강의입니다.</p>
                <section class="section-card">
                    <h4 class="ir_so">카드 컨텐츠</h4>
                    <ul class="card-list2">
                        <li>
                            <a href="#">
                                <img src="../assets/img/post01.jpg" alt="dd">
                            </a>
                            <div class="item">
                                <strong>포트폴리오를 만드는 가장 쉬운 방법입니다.</strong>
                                <span class="keyword">
                                    <span>#초보</span><span>#mysql</span><span>#사이트</span>
                                </span>
                            </div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../assets/img/post02.jpg" alt="dd">
                            </a>
                            <div class="item">
                                <strong>변화를 만드는 AI, 카카오 i</strong>
                                <span class="keyword">
                                    <span>#초보</span><span>#mysql</span><span>#사이트</span>
                                </span>
                            </div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../assets/img/post03.jpg" alt="dd">
                            </a>
                            <div class="item">
                                <strong>학원을 선택할 때 가장 중요한 것은?</strong>
                                <span class="keyword">
                                    <span>#학원</span><span>#국비지원</span><span>#사이트</span>
                                </span>
                            </div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../assets/img/post04.jpg" alt="dd">
                            </a>
                            <div class="item">
                                <strong>내가 퍼블리셔를 하는 이유는? 프론트앤드 개발자를 하는 이유는?</strong>
                                <span class="keyword">
                                    <span>#퍼블리셔</span><span>#mysql</span><span>#사이트</span>
                                </span>
                            </div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../assets/img/post02.jpg" alt="dd">
                            </a>
                            <div class="item">
                                <strong>내가 퍼블리셔를 하는 이유는? 프론트앤드 개발자를 하는 이유는?</strong>
                                <span class="keyword">
                                    <span>#퍼블리셔</span><span>#mysql</span><span>#사이트</span>
                                </span>
                            </div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../assets/img/post01.jpg" alt="dd">
                            </a>
                            <div class="item">
                                <strong>내가 퍼블리셔를 하는 이유는? 프론트앤드 개발자를 하는 이유는?</strong>
                                <span class="keyword">
                                    <span>#퍼블리셔</span><span>#mysql</span><span>#사이트</span>
                                </span>
                            </div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../assets/img/post03.jpg" alt="dd">
                            </a>
                            <div class="item">
                                <strong>내가 퍼블리셔를 하는 이유는? 프론트앤드 개발자를 하는 이유는?</strong>
                                <span class="keyword">
                                    <span>#퍼블리셔</span><span>#mysql</span><span>#사이트</span>
                                </span>
                            </div>
                        </li>
                        <li>
                            <a href="#">
                                <img src="../assets/img/post04.jpg" alt="dd">
                            </a>
                            <div class="item">
                                <strong>내가 퍼블리셔를 하는 이유는? 프론트앤드 개발자를 하는 이유는?</strong>
                                <span class="keyword">
                                    <span>#퍼블리셔</span><span>#mysql</span><span>#사이트</span>
                                </span>
                            </div>
                        </li>
                    </ul>
                </section>
            </article>
            <article class="flow-article content-sub">
                <h3>최신 소식</h3>
                <p>최신 소식을 바로 확인 할 수 있습니다.</p>
                <section class="section-news container">
                    <div class="news">
                        <h4>게시판 업데이트</h4>
                        <ul>
<?php
    $boardNum = 4;
    $sql = "SELECT boardID, boardTitle, regTime FROM webBoard ORDER BY boardID DESC LIMIT {$boardNum}";
    $result = $connect -> query($sql);

    for( $i=1; $i<=$boardNum; $i++ ){
        $info = $result -> fetch_array(MYSQLI_ASSOC);

        echo "<li><a href='../board/boardView.php?boardID=".$info['boardID']."'>".$info['boardTitle']."</a><span>".date('Y-m-d', $info['regTime'])."</span></li>";
    }
?>
                            <!-- <li><a href="#">스크립트 강의 업데이트 예정입니다.</a><span>2021.02.02</span></li>
                            <li><a href="#">유튜브에 강의 업데이트할 예정입니다.</a><span>2021.02.02</span></li>
                            <li><a href="#">스터디 참여에 대해서 자세히 알려드립니다.</a><span>2021.02.02</span></li>
                            <li><a href="#">스터디 강의와 면접 잘 보는 법에 대해서 알려드릴께요~</a><span>2021.02.02</span></li> -->
                        </ul>
                        <a href="../board/board.php" title="더보기" class="more">더보기</a>
                    </div>
                    <div class="news">
                        <h4>댓글 업데이트</h4>
<?php
    $commentNum = 4;
    $sql = "SELECT commentID, youText, youName FROM webComment ORDER BY commentID DESC LIMIT {$commentNum}";
    $result = $connect -> query($sql);

    for( $i=1; $i<=$commentNum; $i++ ){
        $info = $result -> fetch_array(MYSQLI_ASSOC);

        echo "<li><a href='../comment/comment.php#comment'>".$info['youText']."</a><span>".$info['youName']."</span></li>";
    }
?>
                        <!--<ul>
                            <li><a href="#">감사합니다. 잘 보고 있어요^^</a><span>2021.02.02</span></li>
                            <li><a href="#">앞으로도 좋은 영상 부탁드령요~</a><span>2021.02.02</span></li>
                            <li><a href="#">여기가 짱인듯.. 너무 좋아요~~ 너무 필요한 거였어요~ 여기가 짱인듯.. 너무 좋아요~~ </a><span>2021.02.02</span></li>
                            <li><a href="#">앞으로도 좋은 영상 부탁드령요~</a><span>2021.02.02</span></li>
                        </ul> -->
                        <a href="../comment/comment.php#comment" title="더보기" class="more">더보기</a>
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