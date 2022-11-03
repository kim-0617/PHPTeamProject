<?php
    header('Access-Control-Allow-Origin: *');
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";


    $memberID = $_SESSION['myMemberID'];

    $sql = "SELECT * FROM myMember WHERE myMemberID = '$memberID'";
    $result = $connect -> query($sql);
    $info = $result -> fetch_array(MYSQLI_ASSOC);

    // 주소 3단구조로 나누기
    $address = explode('*', $info['youAddress']);
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>개인정보 수정</title>
    <link rel="stylesheet" href="../../html/asset/css/style.css">
    <link rel="stylesheet" href="../../html/asset/css/privacy.css">

    <?php 
        include "../include/link.php";
    ?>
</head>

<body class="waveBg">
    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main">
        <section class="container">
            <div class="Agree_title">
                <h2>개인정보 수정</h2>
            </div>
            <!-- // title -->

            <div class="PrivacyBox">
                <form action="./PrivacySave.php" method="post" enctype="multipart/form-data" onsubmit="return joinChecks();">
                    <fieldset>
                        <legend class="blind">개인정보 수정 폼</legend>
                        <div class="PrivacyGroupInner">
                            <div class="PrivacyGroup1">
                                <div>
                                    <label for="youName">이름</label>
                                    <input type="text" name="youName" id="youName" value="<?=$info['youName']?>" placeholder="이름을 입력해주세요" require>
                                    <p class="warning" id="youNameComment"></p>
                                </div>
                                <div>
                                    <label for="youBirth">생년월일</label>
                                    <input type="date" name="youBirth" id="youBirth" value="<?=$info['youBirth']?>" require>
                                    <p class="warning" id="youBirthComment"></p>
                                </div>
                                <div class="clearfix ID">
                                    <label for="youID">아이디</label>
                                    <input type="text" name="youID" id="youID" value="<?=$info['youID']?>" placeholder="아이디를 입력해주세요" require>
                                    <div class="idCheck btn1">중복확인</div>
                                    <p class="warning" id="youIDComment"></p>
                                </div>
                            </div>
                            <div class="PrivacyGroup2">
                                <div class="PrivacyImgWrap">
                                    <div class="PrivacyImg">
                                        <img id="preview-image" src="../../html/asset/img/profile/<?php if($info['youImageFile']==''){ echo "Noimg.jpg";}else{echo $info['youImageFile'];}; ?>" alt="프로필 이미지">
                                        <p>이미지를<br>등록해 주세요</p>
                                    </div>
                                    <label for="youImg" class="PrivacyImgLabel">+<div class="blind">프로필 이미지</div></label>
                                    <input type="file" name="youImg" id="youImg" accept=".jpg, .jepg, .png" value="<?=$info['youImageFile']?>" placeholder="이미지를 등록해 주세요.">
                                </div>
                                <div>
                                    <label for="youGender" id="youGender">성별</label>
                                    <select name="youGender" id="youGender" require>
                                        <option value="남성">남성</option>
                                        <option value="여성">여성</option>
                                        <option value="감성">감성</option>
                                    </select>
                                </div>

                                <script>
                                    const option = document.querySelectorAll("#youGender option");
                                    const optionCheck = "<?= $info['youGender']?>"
                                    option.forEach((e,i)=>{
                                        if(e.value == optionCheck){
                                            e.selected = true;
                                        }
                                    });

                                    // 이미지 미리보기
                                    function readImage(input) {
                                        // 인풋 태그에 파일이 있는 경우
                                        if(input.files && input.files[0]) {
                                            // 이미지 파일인지 검사 (생략)
                                            // FileReader 인스턴스 생성
                                            const reader = new FileReader()
                                            // 이미지가 로드가 된 경우
                                            reader.onload = e => {
                                                const previewImage = document.getElementById("preview-image")
                                                previewImage.src = e.target.result
                                            }
                                            // reader가 이미지 읽도록 하기
                                            reader.readAsDataURL(input.files[0])
                                        }
                                    }
                                    // input file에 change 이벤트 부여
                                    const inputImage = document.getElementById("youImg")
                                    inputImage.addEventListener("change", e => {
                                        readImage(e.target)
                                    })
                                </script>
                            </div>
                        </div>
                        <div>
                            <label for="youPass">비밀번호</label>
                            <input type="password" name="youPass" id="youPass" placeholder = "변경하지 않을 시 입력하지 마세요" >
                            <p class="warning" id="youPassComment"></p>
                        </div>

                        <div>
                            <label for="youPassC">비밀번호 확인</label>
                            <input type="password" name="youPassC" id="youPassC" placeholder = "변경하지 않을 시 입력하지 마세요" >
                            <p class="warning" id="youPassCComment"></p>
                        </div>
                        <div class="clearfix address">
                            <label for="youAddress1">주소</label>
                            <input type="text" name="youAddress1" id="youAddress1" value="<?=$address[0];?>" placeholder="우편번호" require>
                            <div class="addressCheck btn1">주소 찾기</div>
                            <label for="youAddress2" class="blind">주소</label>
                            <input type="text" name="youAddress2" id="youAddress2" value="<?=$address[1];?>" placeholder="주소" require>
                            <label for="youAddress3" class="blind">주소</label>
                            <input type="text" name="youAddress3" id="youAddress3" value="<?=$address[2];?>" placeholder="상세주소" require>
                            <p class="warning" id="youAddressComment"></p>
                        </div>

                        <div>
                            <label for="youPhone">연락처</label>
                            <input type="text" name="youPhone" id="youPhone" value="<?=$info['youPhone']?>" require>
                            <p class="warning" id="youPhoneComment"></p>
                        </div>

                        <div>
                            <label for="youEmail">이메일</label>
                            <input type="email" name="youEmail" id="youEmail" value="<?=$info['youEmail']?>" require>
                            <p class="warning" id="youEmailComment"></p>
                        </div>

                        <button type="submit" class="join__btn btn3">수정하기</button>
                    </fieldset>
                </form>

                <div id="layer">
                    <img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnCloseLayer" alt="닫기 버튼">
                </div>

                <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
                <script>
                    // 우편번호 찾기 화면을 넣을 element
                    const layer = document.querySelector('#layer');
                    const searchIcon = document.querySelector('.addressCheck');
                    const layerCloseBtn = document.querySelector('#btnCloseLayer');

                    searchIcon.addEventListener('click', searchBtnClick);
                    layerCloseBtn.addEventListener('click', closeDaumPostcode);

                    function closeDaumPostcode() {
                        // iframe을 넣은 element를 안보이게 한다.
                        layer.style.display = 'none';
                    }

                    const themeObj = {
                        //bgColor: "", //바탕 배경색
                        searchBgColor: "#0B65C8", //검색창 배경색
                        //contentBgColor: "", //본문 배경색(검색결과,결과없음,첫화면,검색서제스트)
                        //pageBgColor: "", //페이지 배경색
                        //textColor: "", //기본 글자색
                        queryTextColor: "#FFFFFF" //검색창 글자색
                        //postcodeTextColor: "", //우편번호 글자색
                        //emphTextColor: "", //강조 글자색
                        //outlineColor: "", //테두리
                    };

                    function searchBtnClick() {
                        new daum.Postcode({
                            theme: themeObj,
                            oncomplete: function (data) {
                                // 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                                let addr = ''; // 주소 변수
                                let extraAddr = ''; // 참고항목 변수

                                //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                                if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                                    addr = data.roadAddress;
                                } else { // 사용자가 지번 주소를 선택했을 경우(J)
                                    addr = data.jibunAddress;
                                }

                                /*
                                // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                                if (data.userSelectedType === 'R') {
                                    // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                                    // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                                    if (data.bname !== '' && /[동|로|가]$/g.test(data.bname)) {
                                        extraAddr += data.bname;
                                    }
                                    // 건물명이 있고, 공동주택일 경우 추가한다.
                                    if (data.buildingName !== '' && data.apartment === 'Y') {
                                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                                    }
                                    // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                                    if (extraAddr !== '') {
                                        extraAddr = ' (' + extraAddr + ')';
                                    }
                                    // 조합된 참고항목을 해당 필드에 넣는다.
                                    document.getElementById("sample2_extraAddress").value = extraAddr;

                                } else {
                                    document.getElementById("sample2_extraAddress").value = '';
                                }
                                */


                                document.querySelector('#youAddress1').value = data.zonecode; // 우편번호
                                document.querySelector("#youAddress2").value = addr; // 주소
                                document.querySelector("#youAddress3").focus();

                                // iframe을 넣은 element를 안보이게 한다.
                                // (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
                                layer.style.display = 'none';
                            },
                            width: '100%',
                            height: '100%',
                            maxSuggestItems: 5
                        }).embed(layer);

                        // iframe을 넣은 element를 보이게 한다.
                        layer.style.display = 'block';

                        // iframe을 넣은 element의 위치를 화면의 가운데로 이동시킨다.
                        initLayerPosition();
                    }

                    // 브라우저의 크기 변경에 따라 레이어를 가운데로 이동시키고자 하실때에는
                    // resize이벤트나, orientationchange이벤트를 이용하여 값이 변경될때마다 아래 함수를 실행 시켜 주시거나,
                    // 직접 layer의 top,left값을 수정해 주시면 됩니다.
                    function initLayerPosition() {
                        const width = 500; //우편번호서비스가 들어갈 element의 width
                        const height = 500; //우편번호서비스가 들어갈 element의 height
                        const borderWidth = 5; //샘플에서 사용하는 border의 두께

                        // 위에서 선언한 값들을 실제 element에 넣는다.
                        layer.style.width = width + 'px';
                        layer.style.height = height + 'px';
                        layer.style.border = borderWidth + 'px solid';
                        // 실행되는 순간의 화면 너비와 높이 값을 가져와서 중앙에 뜰 수 있도록 위치를 계산한다.
                        layer.style.left = (((window.innerWidth || document.documentElement.clientWidth) - width) / 2 - borderWidth) + 'px';
                        layer.style.top = (((window.innerHeight || document.documentElement.clientHeight) - height) / 2 - borderWidth) + 'px';
                    }
                </script>
                <!-- // 주소찾기 -->

            </div>
            <!-- // box -->
        </section>
    </main>

    <?php include "../include/footer.php" ?>
        <!-- //footer -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        let idCheck = true;

        const idCheckingBtn = document.querySelector(".idCheck");
        

        idCheckingBtn.addEventListener("click",(e)=>{
            idChecking();
        });
        function idChecking() {
            let youID = $('#youID').val();
            if (youID === '') {
                $('#youIDComment').text('아이디를 입력해 주세요!!');
            }
            else {
                // let idCheckingEqual = document.getElementById("youID").value;
                $.ajax({
                    type: "POST",
                    url: "../login/joinCheck.php",
                    data: { "youID": youID, "type": "idCheck" },
                    dataType: "json",
                    success: function (data) {
                        if (data.result === "good") {
                            $('#youIDComment').text('사용 가능한 아이디 입니다!!');
                            idCheck = true;
                        }else if(document.getElementById("youID").value == "<?=$info['youID']?>"){
                            $('#youIDComment').text('기존 아이디와 동일합니다.');
                            idCheck = true;
                        }else{
                            $('#youIDComment').text('이미 존재하는 아이디 입니다.');
                            idCheck = false;
                        }
                    },
                    error: function (request, status, error) {
                        console.log("request", request);
                        console.log("status", status);
                        console.log("error", error);
                    }
                });
            }
        }

        const YouName = document.getElementById("youName");
        const YouBirth = document.querySelector("#youBirth");
        const YouID = document.querySelector("#youID");
        const YouPass = document.querySelector("#youPass");
        const YouAddress = document.querySelector("#youAddressComment");
        const YouPhone = document.querySelector("#youPhone");
        const YouEmail = document.querySelector("#youEmail");

        function joinChecks() {
            // 이름 공백 확인
            if ($('#youName').val() === '') {
                $('#youNameComment').text("이름을 입력해 주세요!");
                alert("이름을 다시 확인해주세요  ͡° ͜ʖ ͡°  ");
                YouName.scrollIntoView({behavior: "smooth"});
                return false;
            }

            // 이름 유효성 검사
            const getYouName = new RegExp(/^[가-힣]+$/);
            if (!getYouName.test($('#youName').val())) {
                $("#youNameComment").text("이름의 형식이 올바르지 않습니다.");
                $("#youNameComment").val("");
                alert("이름을 다시 확인해주세요  ͡° ͜ʖ ͡°  ");
                YouName.scrollIntoView({behavior: "smooth"});
                return false;
            }

            // 생년월일 공백 확인
            if ($('#youBirth').val() === '') {
                $('#youBirthComment').text("생년월일(YYYY-MM-DD)을 입력해 주세요!");
                alert("생년월일 다시 확인해주세요  ͡° ͜ʖ ͡°  ");
                YouBirth.scrollIntoView({behavior: "smooth"});
                return false;
            }

            // 생년월일 유효성 검사
            const getYouBirth = new RegExp(/^(19[0-9][0-9]|20\d{2})-(0[0-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/);
            if (!getYouBirth.test($("#youBirth").val())) {
                $("#youBirthComment").text("생년월일이 정확하지 않습니다. 올바른 생년월일(YYYY-MM-DD)을 적어주세요!");
                alert("생년월일 다시 확인해주세요  ͡° ͜ʖ ͡°  ");
                YouBirth.scrollIntoView({behavior: "smooth"});
                return false;
            }

            // 아이디 공백 검사
            if ($('#youID').val() === '') {
                $('#youIDComment').text("아이디를 입력해 주세요!");
                alert("아이디를 다시 확인해주세요  ͡° ͜ʖ ͡°  ");
                YouID.scrollIntoView({behavior: "smooth"});
                return false;
            }

            // 아이디 유효성 검사
            const getYouID = $('#youID').val();
            if (getYouID.length < 4 || getYouID.length > 20) {
                $('#youIDComment').text("4자리~ 20자리 이내로 입력해주세요!");
                alert("아이디를 다시 확인해주세요  ͡° ͜ʖ ͡°  ");
                YouID.scrollIntoView({behavior: "smooth"});
                return false;
            }
            else if (getYouID.search(/[\s]/) !== -1) {
                $('#youIDComment').text("아이디는 공백없이 입력해 주세요!");
                alert("아이디를 다시 확인해주세요  ͡° ͜ʖ ͡°  ");
                YouID.scrollIntoView({behavior: "smooth"});
                return false;
            }

            // 아이디 중복 검사
            if (!idCheck) {
                $("#youIDComment").text("아이디 중복 검사를 해주세요!");
                alert("아이디 중복검사를 해주세요  ͡° ͜ʖ ͡°  ");
                YouID.scrollIntoView({behavior: "smooth"});
                return false;
            }

            // 비밀번호 유효성 검사
            const getYouPass = $('#youPass').val();
            const getYouPassNum = getYouPass.search(/[0-9]/g);
            const getYouPassEng = getYouPass.search(/[a-z]/gi);
            const getYouPassSpe = getYouPass.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);

            if ((getYouPass.length < 8 || getYouPass.length > 20) && getYouPass.length > 1) {
                $('#youPassComment').text("8자리~ 20자리 이내로 입력해주세요!");
                alert("비밀번호를 다시 확인해주세요  ͡° ͜ʖ ͡°  ");
                YouPass.scrollIntoView({behavior: "smooth"});
                return false;
            }
            else if (getYouPass.search(/[\s]/) !== -1) {
                $('#youPassComment').text("비밀번호는 공백없이 입력해 주세요!");
                alert("비밀번호를 다시 확인해주세요  ͡° ͜ʖ ͡°  ");
                YouPass.scrollIntoView({behavior: "smooth"});
                return false;
            }
            else if ((getYouPassNum < 0 || getYouPassEng < 0 || getYouPassSpe < 0) && getYouPass.length > 1) {
                $('#youPassComment').text("영문, 숫자, 특수 문자를 혼합하여 입력해 주세요!");
                alert("비밀번호를 다시 확인해주세요  ͡° ͜ʖ ͡°  ");
                YouPass.scrollIntoView({behavior: "smooth"});
                return false;
            }

            // 비밀번호가 동일한지 체크
            if ($('#youPass').val() !== $('#youPassC').val()) {
                $('#youPassCComment').text("비밀번호가 동일하지 않습니다.");
                alert("비밀번호를 다시 확인해주세요  ͡° ͜ʖ ͡°  ");
                YouPass.scrollIntoView({behavior: "smooth"});
                return false;
            }

            // 주소 공백 체크
            if ($('#youAddress1').val() === '' || $('#youAddress2').val() === '' || $('#youAddress3').val() === '') {
                $('#youAddressComment').text("주소를 입력해주세요");
                alert("주소를 다시 확인해주세요  ͡° ͜ʖ ͡°  ");
                YouAddress.scrollIntoView({behavior: "smooth"});
                return false;
            }

            // 휴대폰 번호 공백 확인
            if ($('#youPhone').val() === '') {
                $('#youPhoneComment').text("휴대폰번호(010-0000-0000)를 입력해 주세요!");
                alert("휴대폰 번호를 다시 확인해주세요  ͡° ͜ʖ ͡°  ");
                YouPhone.scrollIntoView({behavior: "smooth"});
                return false;
            }

            // 휴대폰 번호 유효성 검사
            const getYouPhone = RegExp(/01[016789]-[^0][0-9]{2,3}-[0-9]{3,4}/);
            if (!getYouPhone.test($("#youPhone").val())) {
                $("#youPhoneComment").text("휴대폰 번호가 정확하지 않습니다. 올바른 휴대폰번호(000-0000-0000)를 입력해주세요!");
                $("#youPhone").val("");
                alert("휴대폰 번호를 다시 확인해주세요  ͡° ͜ʖ ͡°  ");
                YouPhone.scrollIntoView({behavior: "smooth"});
                return false;
            }

            // 이메일 공백 검사
            if ($('#youEmail').val() === '') {
                $("#youEmailComment").text("이메일을 입력해 주세요!");
                alert("이메일을 다시 확인해주세요  ͡° ͜ʖ ͡°  ");
                YouEmail.scrollIntoView({behavior: "smooth"});
                return false;
            }

            // 이메일 유효성 검사
            const getYouEmail = new RegExp(/^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/);
            if (!getYouEmail.test($('#youEmail').val())) {
                $("#youEmailComment").text("이메일을 형식에 맞게 입력해 주세요!");
                $("#youEmailComment").val("");
                alert("이메일을 다시 확인해주세요  ͡° ͜ʖ ͡°  ");
                YouEmail.scrollIntoView({behavior: "smooth"});
                return false;
            }

            // 이메일 중복 검사
            if (!emailCheck) {
                $("#youEmailComment").text("이메일을 중복 검사를 해주세요!");
                alert("이메일을 다시 확인해주세요  ͡° ͜ʖ ͡°  ");
                YouEmail.scrollIntoView({behavior: "smooth"});
                return false;
            }
        }
    </script>
</body>

</html>