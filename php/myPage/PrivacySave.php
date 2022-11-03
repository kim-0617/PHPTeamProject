<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
$myMemberID = $_SESSION['myMemberID'];
$youName = $_POST['youName'];
$youBirth = $_POST['youBirth'];
$youID = $_POST['youID'];
$youGender = $_POST['youGender'];
$youImgFile = $_FILES['youImg'];
$youImgSize = $_FILES['youImg']['size'];
$youImgType = $_FILES['youImg']['type'];
$youImgName = $_FILES['youImg']['name'];
$youImgTmp = $_FILES['youImg']['tmp_name'];

$youPass = $_POST['youPass'];
$youAddress = $_POST['youAddress1']."*".$_POST['youAddress2']."*".$_POST['youAddress3'];
$youPhone = $_POST['youPhone'];
$youEmail = $_POST['youEmail'];
$regTime = time();
echo "<pre>";
var_dump($youImgFile);
echo "</pre>";
echo $youID;
$youName = $connect -> real_escape_string(trim($youName));
$youBirth = $connect -> real_escape_string(trim($youBirth));
$youID = $connect -> real_escape_string(trim($youID));
$youPass = $connect -> real_escape_string(trim($youPass));
$youAddress = $connect -> real_escape_string(trim($youAddress));
$youPhone = $connect -> real_escape_string(trim($youPhone));
$youEmail = $connect -> real_escape_string(trim($youEmail));
$youGender = $connect -> real_escape_string(trim($youGender));



if($youImgType){
    $fileTypeExtension = explode("/", $youImgType);
    $fileType = $fileTypeExtension[0];  
    $fileExtension = $fileTypeExtension[1];
    if($fileType == "image"){
        if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png"){
            $youImgDir = "../../html/asset/img/profile/";
            $youImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";
            if(!$youPass==''){
                $youPass = password_hash($youPass, PASSWORD_DEFAULT);
                $sql = "UPDATE myMember SET youID = '{$youID}', youBirth = '{$youBirth}', youName = '{$youName}', youPass = '{$youPass}', youAddress = '{$youAddress}', youPhone = '{$youPhone}', youEmail = '{$youEmail}', youGender = '{$youGender}', youImageFile = '{$youImgName}', youImageSize = '{$youImgSize}' WHERE myMemberID = '{$myMemberID}'";
                $result = $connect -> query($sql);
                $result = move_uploaded_file($youImgTmp, $youImgDir.$youImgName);
                echo $youImgName;
                echo "이미지 있음. 비번 입력함 " ;
                echo "<script>alert('변경이 완료되었습니다.'); location.href = './myPageQuestion.php'</script>";

            } else{
                $sql = "UPDATE myMember SET youID = '{$youID}', youBirth = '{$youBirth}', youName = '{$youName}', youAddress = '{$youAddress}', youPhone = '{$youPhone}', youEmail = '{$youEmail}', youGender = '{$youGender}', youImageFile = '{$youImgName}', youImageSize = '{$youImgSize}' WHERE myMemberID = '{$myMemberID}'";
                $result = $connect -> query($sql);
                $result = move_uploaded_file($youImgTmp, $youImgDir.$youImgName);
                echo "이미지 있음. 비번 입력안함";
                echo "<script>alert('변경이 완료되었습니다.'); location.href = './myPageQuestion.php'</script>";

            }
        } else{
            echo "<script> alert('지원하는 이미지 파일이 아닙니다.'); history.back();</script>";
        }
    }
}else {
    if(!$youPass==''){
        $youPass = password_hash($youPass, PASSWORD_DEFAULT);
        $sql = "UPDATE myMember SET youID = '{$youID}', youBirth = '{$youBirth}', youName = '{$youName}', youPass = '{$youPass}', youAddress = '{$youAddress}', youPhone = '{$youPhone}', youEmail = '{$youEmail}', youGender = '{$youGender}' WHERE myMemberID = '{$myMemberID}'";
        $result = $connect -> query($sql);
        echo "이미지 없음. 비번 입력함";
        echo "<script>alert('변경이 완료되었습니다.'); location.href = './myPageQuestion.php'</script>";
    } else{
        $sql = "UPDATE myMember SET youID = '{$youID}', youBirth = '{$youBirth}', youName = '{$youName}', youAddress = '{$youAddress}', youPhone = '{$youPhone}', youEmail = '{$youEmail}', youGender = '{$youGender}' WHERE myMemberID = '{$myMemberID}'";
        $result = $connect -> query($sql);
        echo "이미지 없음. 비번 입력안함";
        echo "<script>alert('변경이 완료되었습니다.'); location.href = './myPageQuestion.php'</script>";
    }
};

//이미지 사이즈 확인
if($youImgSize > 1000000){
    echo "<script>alert('이미지 용량이 1메가를 초과했습니다.'); history.back(); </script>";
}

?>
</body>
</html>
