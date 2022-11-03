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
    <title>로그인</title>

<?php 
    include "../include/link.php";
?>
</head>
<body>
<?php
        function msg($alert){
            echo "<p class='alert'>{$alert}<p/>";
        }

        $LoginMainID = $_POST['LoginMainID'];
        $LoginMainPW = $_POST['LoginMainPW'];

        // 비밀번호 검사
        if( $LoginMainPW == null || $LoginMainPW == '' ){
            msg("비밀번호를 입력해주세요!");
            exit;
        }

        // 데이터 가져오기 --> 유효성 검사  -->  데이터 조회  --> 로그인
        $sql = "SELECT myMemberID, youID, youName, youPass FROM myMember WHERE youID = '$LoginMainID';";
        $result = $connect -> query($sql);
        
        if($result){
            $count = $result -> num_rows;
            $info = $result -> fetch_array(MYSQLI_ASSOC);
            $PWCheck= password_verify($LoginMainPW, $info['youPass']);

            if($count == 0 || $PWCheck != 1){
                msg("아이디 또는 비밀번호가 틀렸습니다.");
                echo "<script>alert('아이디 또는 비밀번호가 틀렸습니다.');</script>";
                echo "<script>location.href = 'http://kkk5993.dothome.co.kr/php/main/main.php'</script>";
                // Header("Location: http://kkk5993.dothome.co.kr/php/main/main.php");
                exit;
            } else {
                $_SESSION['myMemberID'] = $info['myMemberID'];
                $_SESSION['youID'] = $info['youID'];
                $_SESSION['youName'] = $info['youName'];
                $youName = $info['youName'];

                echo "<script>alert(`환영합니다. {$youName}님`);</script>";
                echo "<script>location.href = 'http://kkk5993.dothome.co.kr/php/main/main.php'</script>";
            }
        } else {
            msg("에러발생 - 관리자에게 문의하세요!");
        }
?>
</body>
</html>










