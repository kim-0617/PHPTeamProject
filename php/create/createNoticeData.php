<?php
    include "../connect/connect.php";

    $regTime = time();

    $sql = "INSERT INTO myNotice(myMemberID, noticeTitle, noticeContents, regTime) VALUES('1', '공지사항 제목입니다.', '게시판 내용입니다. 컨텐츠 입니다.', '$regTime')";
    $connect -> query($sql);
?>