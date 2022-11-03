<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>공지사항 수정하기</title>
    <link rel="stylesheet" href="../../html/asset/css/style.css">

    <?php 
        include "../include/link.php";
    ?>
</head>
<body>
    <?php
        include "../include/header.php";
    ?>

    <main id="main">
        <section id="boardWrite" class="container">
            <h2>공지사항 수정하기</h2>
            <div class="boardWrite_Wrap">
                <form action="./noticeModifySave.php" method="post">
                    <fieldset>
                        <legend class="blind">대분류 / 소분류 카테고리 선택하기</legend>
<?php
    $myNoticeID = $_GET['myNoticeID'];
    $sql = "SELECT myNoticeID, myMemberID, noticeTitle, noticeContents FROM myNotice WHERE myNoticeID = $myNoticeID";
    $result = $connect -> query($sql);

    if($result) {
        $info = $result -> fetch_array(MYSQLI_ASSOC);
        if($info['myMemberID'] !== $_SESSION['myMemberID']) {
            echo "<script>alert('당신의 글이 아닙니다.'); location.href = './notice.php';</script>";
        }
        else {
            echo "<div style='display:none;'><label for='myNoticeID'>번호</label><input type='text' name='myNoticeID' id='myNoticeID' value='".$info['myNoticeID']."'></div>";
            echo "<div><label for='noticeTitle'>제목</label><input type='text' name='noticeTitle' id='noticeTitle' value='".$info['noticeTitle']."'></div>";
            echo "<div><label for='noticeContents'>내용</label><textarea name='noticeContents' id='noticeContents' rows='20'>".$info['noticeContents']."</textarea></div>";
        }
    }
?>
                        <div class="Writebtn">
                            <button type="submit" class="btn1">수정</button>
                            <a href="../main/main.php" class="btn2">취소</a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </section>
    </main>
    <?php
        include "../include/footer.php";
    ?>
</body>
</html>