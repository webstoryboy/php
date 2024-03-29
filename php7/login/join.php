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
            <section id="mainContent" class="gray">
                <h2 class="screen_out">회원가입 컨텐츠</h2>
                <article class="content-article">
                    <div class="login-form">
                        <h2>회원가입</h2>
                        <div class="join-info">
                            <ul class="list mb20">
                                <li>회원가입은 1인당 1개의 이메일 계정을 이용할 수 있습니다.</li>
                                <li>개인정보를 수집 및 이용하며, 회원의 개인정보를 안전하게 취급하고, 교육을 목적으로 사용됩니다.</li>
                            </ul>
                        </div>
                        <h3>개인정보 수집 및 이용에 대한 안내</h3>
                        <div class="join-privacy">
                            <ol class="list">
                                <li>목적 : 가입자 개인 식별, 가입 의사 확인, 가입자와의 원활한 의사소통, 가입자와의 교육 커뮤니테이션</li>
                                <li>항목 : 아이디(이메일주소), 비밀번호, 이름, 생년월일, 휴대폰번호</li>
                                <li>보유기간 : 회원 탈퇴 시까지 보유(탈퇴일로부터 즉시 파기합니다.)</li>
                                <li>개인정보 수집에 대한 동의를 거부할 권리가 있으며, 회원 가입시 개인정보 수집을 동의함으로 간주합니다.</li>
                            </ol>
                        </div>
                        <form action="joinSave.php" method="post" name="join">
                            <fieldset>
                                <legend class="screen_out">회원가입 입력폼</legend>
                                <div class="login-box">
                                    <div>
                                        <label for="youEmail">이메일</label>
                                        <input type="email" name="youEmail" id="youEmail" class="input_write" placeholder="sample@naver.com" autocomplete="off" autofocus>
                                    </div>
                                    <div>
                                        <label for="youPass">비밀번호</label>
                                        <input type="password" name="youPass" id="youPass" class="input_write" placeholder="비밀번호를 적어주세요!" autocomplete="off">
                                    </div>
                                    <div>
                                        <label for="youPassC">비밀번호 확인</label>
                                        <input type="password" name="youPassC" id="youPassC" class="input_write" placeholder="다시 한번 비밀번호를 적어주세요!" autocomplete="off">
                                    </div>
                                    <div>
                                        <label for="youName">이름</label>
                                        <input type="text" name="youName" id="youName" class="input_write" placeholder="이름을 적어주세요!" autocomplete="off">
                                    </div>
                                    <div>
                                        <label for="youBirth">생년월일</label>
                                        <input type="text" name="youBirth" id="youBirth" class="input_write" placeholder="YYYY-MM-DD" autocomplete="off">
                                    </div>
                                    <div>
                                        <label for="youNumber">휴대폰 번호</label>
                                        <input type="text" name="youNumber" id="youNumber" class="input_write" placeholder="000-0000-0000" autocomplete="off">
                                    </div>
                                </div>
                            </fieldset>
                            <button id="btn_submit" type="submit" class="login_btn mt10">회원가입 완료</button>
                        </form>
                    </div>
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