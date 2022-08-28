<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP class : 회원가입</title>

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
                    <h3>회원가입</h3>
                    <?php
    include "../connect/connect.php";

    $youEmail = $_POST['youEmail'];
    $youPass = $_POST['youPass'];
    $youPassC = $_POST['youPassC'];
    $youName = $_POST['youName'];
    $youBirth = $_POST['youBirth'];
    $youPhone = $_POST['youPhone'];
    $regTime = time();

    //echo $youEmail, $youPass, $youPassC, $youName, $youBirth, $youPhone;

    // $sql = "INSERT INTO andMember(youEmail, youPass, youName, youBirth, youPhone, regTime) VALUES('$youEmail', '$youPass', '$youName', '$youBirth', '$youPhone', '$regTime')";

    // $result = $connect -> query($sql);

    // if($result){
    //     echo "INSERT INTO True";
    // } else {
    //     echo "INSERT INTO False";
    // }

    //메세지 출력
    function msg($alert){
        echo "<p class='alert'>{$alert}</p>";
    }

    //유효성 검사
    if( $youPass == null || $youPass == '' ){
        msg("비밀번호를 입력해주세요!!");
        exit;
    }
    if( $youPassC == null || $youPassC == ''){
        msg("확인 비밀번호를 입력해주세요!!");
        exit;
    }
    if( $youName == null || $youName == ''){
        msg("이름을 입력해주세요!!");
        exit;
    }
    if( $youBirth == null || $youBirth == ''){
        msg("생년월일을 입력해주세요!!");
        exit;
    }
    if( $youPhone == null || $youPhone == ''){
        msg("연락처를 입력해주세요!!");
        exit;
    }

    //이메일 유효성 검사(내장 함수)
    // $check_email = filter_var($youEmail, FILTER_VALIDATE_EMAIL);

    // if( $check_email == false) {
    //     msg("이메일이 잘못되었습니다<br> 올바른 이메일을 적어주세요!");
    //     exit;
    // }

    //이메일 유효성 검사(정규식 표현)
    // $check_email = preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $youEmail);

    // if( $check_email == false) {
    //     msg("이메일이 잘못되었습니다<br> 올바른 이메일을 적어주세요!");
    //     exit;
    // }

    //비밀번호 검사
    if( $youPass !== $youPassC ) {
        msg("비밀번호가 일치하지 않습니다. <br> 다시 하나번 확인해주세요!");
        exit;
    }

    //비밀번호 암호화 
    //$youPass = sha1($youPass)

    //이름 검사
    $check_name = preg_match("/^[가-힣]{1,}$/", $youName);

    if( $check_name == false ){
        msg("이름이 정확하지 않습니다. <br> 한글로만 적어주세요!");
        exit;
    }

    //생년월일 검사
    $check_birth = preg_match("/^(19[0-9][0-9]|20\d{2})-(0[0-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $youBirth);

    if( $check_birth == false ){
        msg("생년월일이 정확하지 않습니다. <br> 올바른 생년월일(YYYY-MM-DD)을 적어주세요!");
        exit;
    }

    //휴대폰 번호 검사
    $check_number = preg_match("/^(010|011|016|017|018|019)-[0-9]{3,4}-[0-9]{4}$/", $youPhone);

    if( $check_number == false ){
        msg("번호가 정확하지 않습니다. <br> 올바른 번호(000-0000-0000)를 적어주세요!");
        exit;
    }

    //데이터 가져오기 --> 유효성 검사 --> 데이터 중복검사(X) --> 데이터 넣어주기
    //데이터 가져오기 --> 유효성 검사 --> 데이터 중복검사(O) --> 로그인 유도

    //이메일 중복검사
    $isEmailCheck = false; 

    $sql = "SELECT youEmail FROM andMember WHERE youEmail = '$youEmail'";
    $result = $connect -> query($sql);

    if($result){
        $count = $result -> num_rows;
        // echo $count;

        if($count == 0){
            //회원가입 가능
            $isEmailCheck = true;
        } else {
            //로그인
            msg("이미 회원이 가입되어 있습니다. <br> 로그인을 해주세요!!");
            exit;
        }
    } else {
        msg("에러발생1 - 관리자에게 문의하세요!!");
        exit;
    }

    //핸드폰 중복 검사
    $isPhoneCheck = false;

    $sql = "SELECT youPhone FROM andMember WHERE youPhone = '$youPhone'";
    $result = $connect -> query($sql);

    if($result){
        $count = $result -> num_rows;

        if($count == 0){
            //회원가입 가능
            $isPhoneCheck = true;
        } else {
            //로그인
            msg("이미 회원이 가입되어 있습니다. <br> 로그인을 해주세요!!");
            exit;
        }
    } else {
        msg("에러발생2 - 관리자에게 문의하세요!!");
        exit;
    }

    //데이터 가져오기 -> 유효성 검사 -> 중복검사(이메일, 핸드폰) -> 회원가입(데이터 입력하기)
    if($isEmailCheck == true && $isPhoneCheck == true){
        $sql = "INSERT INTO andMember(youEmail, youPass, youName, youBirth, youPhone, regTime) VALUES('$youEmail', '$youPass', '$youName', '$youBirth', '$youPhone', '$regTime')";
        $result = $connect -> query($sql);

        if($result){
            msg("회원가입을 축하합니다.!!! 로그인 해주세요!!!");
        } else {
            msg("에러발생3 - 관리자에게 문의하세요!");
            exit;
        }
    } else {
        msg("이메일 또는 핸드폰 번호가 틀립니다. 다시 한번 확인해주세요!!!");   
        exit;
    }

?>
                </div>
            </article>
        </section>
    </main>
    <!-- //main -->

    <?php
        include "../include/footer.php";
    ?>
    <!-- //header -->
</body>
</html>



