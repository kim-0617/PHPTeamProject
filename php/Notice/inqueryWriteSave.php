<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $myMemberID = $_SESSION['myMemberID'];
    $inquiryAuthor = $_SESSION['youName'];
    $inquiryTitle = $_POST['inquiryWirte'];
    $inquiryContents = $_POST['inquiryDesc'];
    $inquiryCategory = $_POST['searchOption'];
    $inquiryEmail = $_POST['inquiryEmail'];

    $regTime = time();
    $blogImgFile = $_FILES['myfile'];
    $blogImgSize = $_FILES['myfile']['size'];
    $blogImgType = $_FILES['myfile']['type'];
    $blogImgName = $_FILES['myfile']['name'];
    $blogImgTmp = $_FILES['myfile']['tmp_name'];

    if($blogImgType){
        $fileTypeExtension = explode("/", $blogImgType);
        $fileType = $fileTypeExtension[0];
        $fileExtension = $fileTypeExtension[1];
        //이미지 타입 확인
        if($fileType == "image"){
            if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                $blogImgDir = "http://kkk5993.dothome.co.kr/php/Notice/img/";
                $blogImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";
                $sql = "INSERT INTO myInquiry(myMemberID, youEmail, inquiryTitle, inquiryContents, inquiryCategory, inquiryAuthor, blogImgFile, blogImgSize, regTime) VALUES('$myMemberID', '$inquiryEmail', '$inquiryTitle', '$inquiryContents', '$inquiryCategory', '$inquiryAuthor', '$blogImgName', '$blogImgSize', '$regTime')";
            } else {
                echo "<script>alert('지원하는 이미지 파일이 아닙니다.'); history.back(1)</script>";
            }
            }
        } else {
            $sql = "INSERT INTO myInquiry(myMemberID, youEmail, inquiryTitle, inquiryContents, inquiryCategory, inquiryAuthor, blogImgFile, blogImgSize, regTime) VALUES('$myMemberID', '$inquiryEmail', '$inquiryTitle', '$inquiryContents', '$inquiryCategory', '$inquiryAuthor', 'Img_default.jpg', '$blogImgSize', '$regTime')";
            echo "이미지 파일이 첨부하지 않았습니다.";
        }
        //이미지 사이즈 확인
        if($blogImgSize > 1000000){
            echo "<script>alert('이미지 용량이 1메가를 초과했습니다.'); history.back(1)</script>";
            exit;
        }

        $result = $connect -> query($sql);
        $result = move_uploaded_file($blogImgDir, $blogImgName);
        Header("Location: FaQ.php");
?>