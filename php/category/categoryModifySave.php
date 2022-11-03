<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<?php

    $myTipsID = $_GET['myTipsID'];

    $boardCateBig = $_POST['searchOption1'];
    $boardCateSmall = $_POST['searchOption2'];
    $boardTitle = $_POST['boardWriteHeader'];
    $boardContents = nl2br($_POST['boardWriteDesc']);
    $boardTag = $_POST['boardWriteTag'];
    $youImgFile = $_FILES['youImg'];
    $youImgSize = $_FILES['youImg']['size'];
    $youImgType = $_FILES['youImg']['type'];
    $youImgName = $_FILES['youImg']['name'];
    $youImgTmp = $_FILES['youImg']['tmp_name'];


    echo "<pre>";
    var_dump($youImgFile);
    echo "</pre>";


    $boardTitle = $connect -> real_escape_string($boardTitle);
    $boardContents = $connect -> real_escape_string($boardContents);
    $regTime = time();
    $myMemberID = $_SESSION['myMemberID'];
    $youName = $_SESSION['youName'];

    $sql = "SELECT myMemberID FROM myMember WHERE myMemberID = {$myMemberID};";
    $result = $connect -> query($sql);

    $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);

    if($memberInfo['myMemberID'] === $myMemberID) {
        if($youImgType){
            $fileTypeExtension = explode("/", $youImgType);
            $fileType = $fileTypeExtension[0];  
            $fileExtension = $fileTypeExtension[1];
            if($fileType == "image"){
                if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png"){
                    $youImgDir = "../../html/asset/img/category/";
                    $youImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";
                    $sql = "UPDATE myTips SET TipsTitle = '$boardTitle', TipsContents = '$boardContents', TipsCateBig = '$boardCateBig', TipsCateSmall = '$boardCateSmall', TipsTag = '$boardTag', TipsImg = '$youImgName', regTime = '$regTime' WHERE myTipsID={$myTipsID}";
                    $connect -> query($sql);
                    $result = move_uploaded_file($youImgTmp, $youImgDir.$youImgName);
                    echo " <script> location.href = 'http://kkk5993.dothome.co.kr/php/category/small_cg_detail.php?categoryBig=$boardCateBig&categorySmall=$boardCateSmall&myTipsID=$myTipsID'; </script>";
                } else{
                    echo "<script> alert('지원하는 이미지 파일이 아닙니다.');  history.back();</script>";
                }   
            }else{
                echo "<script> alert('지원하는 이미지 파일이 아닙니다.');  history.back();</script>";
            }
        }else {           
            $sql = "UPDATE myTips SET TipsTitle = '$boardTitle', TipsContents = '$boardContents', TipsCateBig = '$boardCateBig', TipsCateSmall = '$boardCateSmall', TipsTag = '$boardTag', regTime = '$regTime' WHERE myTipsID={$myTipsID}";
            $connect -> query($sql);
            echo " <script> location.href = 'http://kkk5993.dothome.co.kr/php/category/small_cg_detail.php?categoryBig=$boardCateBig&categorySmall=$boardCateSmall&myTipsID=$myTipsID'; </script>";
            // 이미지없음
        };
    }
?>

<!-- <script>

    // function page(){
        location.href = 'http://kkk5993.dothome.co.kr/php/category/small_cg_detail.php?categoryBig=<?php echo $boardCateBig;?>&categorySmall=<?php echo $boardCateSmall;?>&myTipsID=<?php echo $myTipsID;?>';
    // }
</script> -->