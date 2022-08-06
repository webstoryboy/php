<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>

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
        <section class="join-type gray">
        <?php
            include "../connect/connect.php";

            $youEmail = $_POST['youEmail'];
            $youPass = $_POST['youPass'];
            $youPassC = $_POST['youPassC'];
            $youName = $_POST['youName'];
            $youBirth = $_POST['youBirth'];
            $youPhone = $_POST['youPhone'];
            $regTime = time();

            //echo $youEmail, $youPass, $youPassC, $youName, $youBirth, $youPhone, $regTime;

            // $sql = "INSERT INTO webMember(youEmail, youPass, youName, youBirth, youPhone, regTime) VALUES('$youEmail', '$youPass', '$youName', '$youBirth', '$youPhone', '$regTime')";

            // $result = $connect -> query($sql);

            // if( $result ){
            //     echo "INSERT INTO true";
            // } else {
            //     echo "INSERT INTO false";
            // }

            //메세지 출력
            function msg($alert){
                echo "<p class='alert'>{$alert}</p>";
            }

            //유효성 검사 : 이메일(내장함수)
            $check_email = filter_var($youEmail, FILTER_VALIDATE_EMAIL);

            if($check_email == false){
                msg("이메일이 잘못되었습니다.<br>올바른 이메일을 적어주세요!");
                exit;
            }

            //유효성 검사 : 이메일(정규식표현)
            //$check_email = preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $youEmail);

            //유효성 검사 : 이름(정규식표현)
            $check_name = preg_match("/^[가-힣]{1,}$/", $youName);
            
            if($check_name == false){
                msg("이름이 정확하지 않습니다. <br>한글로만 적어주세요!");
                exit;
            }

            //유효성 검사 : 휴대폰번호(정규식표현)
            $check_number = preg_match("/^(010|011|016|017|018|019)-[0-9]{3,4}-[0-9]{4}$/", $youPhone);

            if($check_number == false){
                msg("번호가 정확하지 않습니다. <br>올바른 생년월인(000-0000-0000) 적어주세요!");
            }

            //유효성 검사 통과 --> 자격 확인 --> 이메일 주소 && 핸드폰 번호 X --> 회원가입
            //유효성 검사 통과 --> 자격 확인 --> 이메일 주소 && 핸드폰 번호 O --> 로그인

            //이메일 데이터 중복검사
            $isEmailCheck = false;

            $sql = "SELECT youEmail FROM webMember WHERE youEmail = '$youEmail'";
            $result = $connect -> query($sql);

            if($result) {
                $count = $result -> num_rows;
                if($count == 0){
                    //회원가입 가능
                    $isEmailCheck = true;
                } else {
                    msg("이미 회원가입이 되어 있습니다. 로그인을 해주세요!");
                    exit;
                }
            } else {
                msg("에러발생01 : 관리자에게 문의하세요!!");
                exit;
            }

            //핸드폰 번호 데이터 중복검사
            $isPhoneCheck = false;

            $sql = "SELECT youPhone FROM webMember WHERE youPhone = '$youPhone'";
            $result = $connect -> query($sql);

            if($result){
                $count = $result -> num_rows;
                if($count == 0){
                    $isPhoneCheck = true;
                } else {
                    msg("이미 회원가입이 되어 있습니다. 로그인을 해주세요!");
                    exit;
                }
            } else {
                msg("에러발생02 : 관리자에게 문의하세요!!");
                exit;
            }

            //회원가입
            if($isEmailCheck == true && $isPhoneCheck == true){
                $sql = "INSERT INTO webMember(youEmail, youPass, youName, youBirth, youPhone, regTime) VALUES('$youEmail', '$youPass', '$youName', '$youBirth', '$youPhone', '$regTime')";
                $result = $connect -> query($sql);

                if($result){
                    msg("회원가입을 축하합니다.!!! 로그린을 해주세요!!!");
                } else {
                    msg("에러발생03 : 관리자에게 문의하세요");
                }
            } else {
                msg("이메일 또는 핸드폰 번호가 틀렸습니다. 다시 한번 확인해주세요!!");
                exit;
            }
        ?>
        </section>
    </main>

    <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->
</body>
</html>