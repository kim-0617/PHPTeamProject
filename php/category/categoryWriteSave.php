<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<?php
    $boardCateBig = $_POST['searchOption1'];
    $boardCateSamll = $_POST['searchOption2'];
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


    if($youImgType){
        $fileTypeExtension = explode("/", $youImgType);
        $fileType = $fileTypeExtension[0];  
        $fileExtension = $fileTypeExtension[1];
        if($fileType == "image"){
            if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png"){
                $youImgDir = "../../html/asset/img/category/";
                $youImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";
                $sql = "INSERT INTO myTips(myMemberID, TipsTitle, TipsContents, TipsCateBig, TipsCateSmall, TipsTag, TipsImg, regTime) VALUES('$myMemberID','$boardTitle','$boardContents', '$boardCateBig', '$boardCateSamll', '$boardTag', '$youImgName', '$regTime')";
                $connect -> query($sql);
                $result = move_uploaded_file($youImgTmp, $youImgDir.$youImgName);

                $sql = "SELECT myTipsID FROM myTips WHERE myTipsID = (SELECT max(myTipsID) FROM myTips WHERE TipsCateBig = '$boardCateBig' AND TipsCateSmall = '$boardCateSamll')";
                $TipsIDResult = $connect -> query($sql);
                $TipsID = $TipsIDResult -> fetch_array(MYSQLI_ASSOC);
                echo $boardCateBig;
                echo $boardCateSamll;
                echo "
                <script>
                    location.href='./small_cg_detail.php?categoryBig=$boardCateBig&categorySmall=$boardCateSamll&myTipsID={$TipsID['myTipsID']}';
                </script>";
            }else {
                echo "<script> alert('오류입니다. 이전페이지로 돌아갑니다'); history.back();</script>";
            }
        } else {
            echo "<script> alert('지원하는 이미지 파일이 아닙니다.'); history.back();</script>";
        }
    }else{
        $sql = "INSERT INTO myTips(myMemberID, TipsTitle, TipsContents, TipsCateBig, TipsCateSmall, TipsTag, regTime) VALUES('$myMemberID','$boardTitle','$boardContents', '$boardCateBig', '$boardCateSamll', '$boardTag', '$regTime')";
        $connect -> query($sql);
        $sql = "SELECT myTipsID FROM myTips WHERE myTipsID = (SELECT max(myTipsID) FROM myTips WHERE TipsCateBig = '$boardCateBig' AND TipsCateSmall = '$boardCateSamll')";
        $TipsIDResult = $connect -> query($sql);
        $TipsID = $TipsIDResult -> fetch_array(MYSQLI_ASSOC);
        echo "
        <script>
            location.href='./small_cg_detail.php?categoryBig=$boardCateBig&categorySmall=$boardCateSamll&myTipsID={$TipsID['myTipsID']}';
        </script>";
    }
    $sql = "SELECT myTipsID FROM myTips WHERE myTipsID = (SELECT max(myTipsID) FROM myTips)";
    $TipsIDResult = $connect -> query($sql);
    $TipsID = $TipsIDResult -> fetch_array(MYSQLI_ASSOC);


//이미지 사이즈 확인
if($youImgSize > 1000000){
    echo "<script>alert('이미지 용량이 1메가를 초과했습니다.'); history.back();</script>";
}

?>

<script>
</script>