<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1:1 문의하기</title>
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
            <h2>1:1 문의하기</h2>
            <div class="boardWrite_Wrap">
                <form action="inqueryWriteSave.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend class="blind">문의 유형 선택하기</legend>
                        <div>
                            <select name="searchOption" id="searchOption">
                                <option value="이용문의">이용 문의</option>
                                <option value="계정">계정</option>
                            </select>
                        </div>
                        <div>
                            <label for="inquiryEmail">이메일</label>
                            <input type="email" name="inquiryEmail" id="inquiryEmail" placeholder="이메일을 입력하세요" required>
                        </div>
                        <div>
                            <label for="inquiryWirte">제목</label>
                            <input type="text" name="inquiryWirte" id="inquiryWirte" placeholder="제목을 입력하세요" required>
                        </div>
                        <div>
                            <label for="inquiryDesc">본문</label>
                            <textarea name="inquiryDesc" id="inquiryDesc"></textarea>
                        </div>
                        <div class="TagWrap">
                            <label for="myfile" class="blind">파일첨부</label>
                            <input class="inquiryInput" type="file" name="myfile">
                            <!-- <input class="boardWriteTag" type="text" name="boardWriteTag" id="boardWriteTag" placeholder="#태그 (#으로 구분해주세요)" required> -->
                        </div>
                        <div class="Writebtn">
                            <button type="submit" class="btn1">작성</button>
                            <a href="http://kkk5993.dothome.co.kr/php/Notice/FaQ.php" class="btn2">취소</a>
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