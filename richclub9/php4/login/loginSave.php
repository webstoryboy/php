<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $youEmail = $_POST['youEmail'];
    $youPass = $_POST['youPass'];

    // 메세지 출력
    function msg($alert){
        echo "<p class='alert'>{$alert}</p>";
    }

    // 이메일 유효성 검사
    if(!filter_var($youEmail, FILTER_VALIDATE_EMAIL)){
        msg("이메일이 잘못되었습니다.<br>올바른 이메일을 적어주세요!");
        exit;
    } 

    // 비밀번호 유효성 검사
    if($youPass == null || $youPass == ''){
        msg("비밀번호를 입력해주세요!!");
    }

    // 데이터 가져오기 --> 데이터 검사 --> 로그인(세션 데이터 추가)
    $sql = "SELECT memberID, youName, youEmail, youPass FROM webMember WHERE youEmail = '$youEmail' AND youPass ='$youPass'";
    $result = $connect -> query($sql);

    if($result){
        $count = $result -> num_rows;

        if($count == 0){
            msg("이메일 또는 비밀번호가 잘못되었습니다. 다시 한번 확인해주세요!!!");
        } else {
            $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);

            //세션 추가
            $_SESSION['memberID'] = $memberInfo['memberID'];
            $_SESSION['youName'] = $memberInfo['youName'];
            $_SESSION['youEmail'] = $memberInfo['youEmail'];

            //페이지 이동
            Header("Location: ../pages/main.php");

            // echo "<pre>";
            // var_dump($memberInfo);
            // echo "</pre>";
        }
    }
?>