<?php
    include "../connect/connect.php";

    $regTime = time();

    $sql = "INSERT INTO myTips(myMemberID, TipsTitle, TipsContents, TipsView, TipsCateBig, TipsCateSmall, regTime) VALUES('1', '팁 제목입니다.', '팁 내용입니다. 컨텐츠 입니다.', '0', '전자기기', '핸드폰', '$regTime')";
    $connect -> query($sql);
?>