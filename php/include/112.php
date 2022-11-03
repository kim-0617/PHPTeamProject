<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>신고하기</title>
    <link rel="stylesheet" href="../../html/asset/css/112.css">
    <link rel="stylesheet" href="../../html/asset/css/style.css">
</head>
<body>
    <div id="police__wrap">
        <section id="police__box">
            <div class="police__inner">
                <div class="police__header">
                    <div>
                        <!-- <img src="../../html/asset/img/profile/Noimg.jpg" alt="프로필이미지"> -->
                        <img src="../../html/asset/img/profile/Noimg.jpg" alt="프로필이미지">
                    </div>
                    <h2>유저 신고하기</h2>
                </div>
                <p class="police__desc">
                    이 유저를 신고하게 된 사유를 가능한 한 상세하게 적어주세요.
                    <br/> 공정한 처리를 하는데 도움이 될 거에요.
                    <br/> 함께 깨끗한 잡스비를 만들어요.
                </p>
                <form method="post">
                    <fieldset>
                        <legend class="blind">신고하기 창</legend>
                        <ul>
                            <li>
                                <input required class="inputTag" type="radio" name="police" id="police__pokun">
                                <label for="police__pokun">폭언 및 욕설</label>
                            </li>
                            <li>
                                <input required class="inputTag" type="radio" name="police" id="police__dobae">
                                <label for="police__dobae">도배</label>
                            </li>
                            <li>
                                <input required class="inputTag" type="radio" name="police" id="police__galdng">
                                <label for="police__galdng">갈등 및 분쟁 조장</label>
                            </li>
                            <li>
                                <input required class="inputTag" type="radio" name="police" id="police__idsayoung">
                                <label for="police__idsayoung">부적절한 아이디 사용</label>
                            </li>
                            <li>
                                <input required class="inputTag" type="radio" name="police" id="police__gita">
                                <label for="police__gita">기타</label>
                            </li>
                        </ul>
                        <div class="text">
                            <p class="textLimit"><span id ="count">0</span>/100 자</p>
                            <label for="youEmail" class="blind">상세설명</label>
                            <textarea id="text-area" class="sangse" placeholder="이곳에 상세한 내용을 적어주세요 (100자 제한)" maxlength="100" resize="none"> </textarea>
                        </div>
                        <div class="btn__box">
                            <button type="submit" class="btn1">신고하기</button>
                            <a href="#" class="police__cancle btn3">취소하기</a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </section>
    </div>

    <script>
        const textBox = document.querySelector(".sangse");
        document.getElementById("text-area").addEventListener('keyup',checkByte);
        let countSpan = document.getElementById('count');
        let message = '';
        let maxMsg = 100;

        function count(message){
            let totalByte = 0;

            for(let i = 0; i < 100; i ++){
                let currentByte = message.charCodeAt(i);
                (currentByte > 128) ? totalByte += 2 : totalByte ++;
            }
            return totalByte;
        }

        function checkByte(event){
            const totalByte = count(event.target.value);
            let length = event.target.value.length;
            if (length <= 100){
                countSpan.innerText = length;
                message = event.target.value;
            }else {
                alert("100글자이내로 작성해주세요");
                event.target.value = message;
            }
        }
    </script>
</body>
</html>