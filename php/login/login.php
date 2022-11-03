<div id="login__wrap">
    <section id="login__box">
        <div class="login__inner LoginMain">
            <h2>로그인</h2>
            <form name="login" action="http://kkk5993.dothome.co.kr/php/login/loginSave.php" method="post">
                <fieldset>
                    <legend class="blind">로그인 입력 폼</legend>
                    <div>
                        <label for="LoginMainID" class="blind">아이디</label>
                        <input type="text" name="LoginMainID" id="LoginMainID" placeholder="아이디" required>
                    </div>
                    <div>
                        <label for="LoginMainPW" class="blind">비밀번호</label>
                        <input type="password" name="LoginMainPW" id="LoginMainPW" placeholder="비밀번호" required>
                    </div>
                    <button type="submit" class="btn1">로그인</button>
                    <a href="#" class="subLogin btn2">간편 로그인</a>
                </fieldset>
            </form>

            <div class="login__service">
                <a href="http://kkk5993.dothome.co.kr/php/login/joinAgree.php" class="join btn3">회원가입</a>
                <div class="findID btn3">아이디 찾기</div>
                <div class="findPW btn3">비밀번호 찾기</div>
            </div>
        </div>
        <!-- // 로그인폼 -->
        
        <div class="login__inner SearchIDPhone">
            <h2>아이디 찾기(휴대폰)</h2>
            <form action="" method="post">
                <fieldset>
                    <legend class="blind">로그인 입력 폼</legend>
                    <div>
                        <label for="SearchIDPhoneName" class="blind">이름</label>
                        <input type="text" name="SearchIDPhoneName" id="SearchIDPhoneName" placeholder="이름" required>
                    </div>
                    <div>
                        <label for="SearchIDPhonePhone" class="blind">휴대폰 입력</label>
                        <input type="text" name="SearchIDPhonePhone" id="SearchIDPhonePhone" placeholder="휴대폰 입력" required>
                    </div>
                    <button type="submit" class="btn1">아이디 찾기</button>
                </fieldset>
            </form>
            <div class="login__find">
                <div class="emailFind btn3 fs">이메일로 찾기</div>
                <div class="pwFind btn2 fs">비밀번호 찾기</div>
            </div>
        </div>
        <!-- // 휴대폰 번호로 아이디 찾기 -->

        <div class="login__inner SearchIDEmail">
            <h2>아이디 찾기(이메일)</h2>
            <form action="#" method="post">
                <fieldset>
                    <legend class="blind">로그인 입력 폼</legend>
                    <div>
                        <label for="SearchIDEmailName" class="blind">이름</label>
                        <input type="text" name="SearchIDEmailName" id="SearchIDEmailName" placeholder="이름" required>
                    </div>
                    <div>
                        <label for="SearchIDEmailEmail" class="blind">이메일 입력</label>
                        <input type="email" name="SearchIDEmailEmail" id="SearchIDEmailEmail" placeholder="이메일 입력" required>
                    </div>
                    <button type="submit" class="btn1">아이디 찾기</button>
                </fieldset>
            </form>

            <div class="login__find">
                <div class="phoneFind btn3 fs">휴대폰번호<br> 찾기</div>
                <div class="pwFind btn2 fs">비밀번호 찾기</div>
            </div>
        </div>
        <!-- // 이메일로 아이디 찾기 -->

        <div class="login__inner SearchIDResult">
            <h2>아이디 찾기 결과</h2>
            <div class="result__text">
                <p class="result">
                    가입하신 아이디는 <br>
                    <span>asjefoisjeoifisj</span> <br>
                    입니다.
                </p>
            </div>

            <div class="login__result">
                <div class="join btn2 fs">로그인</div>
                <div class="findPW btn3 fs">비밀번호 찾기</div>
            </div>
        </div>
        <!-- // 아이디 찾기 결과 -->

        <div class="login__inner SearchPWEmail">
            <h2>비밀번호 찾기(이메일)</h2>
            <form action="#" method="post">
                <fieldset>
                    <legend class="blind">로그인 입력 폼</legend>
                    <div>
                        <label for="SearchPWEmailID" class="blind">아이디</label>
                        <input type="text" name="SearchPWEmailID" id="SearchPWEmailID" placeholder="아이디" required>
                    </div>
                    <div>
                        <label for="SearchPWEamilName" class="blind">이름</label>
                        <input type="text" name="SearchPWEamilName" id="SearchPWEamilName" placeholder="이름" required>
                    </div>
                    <div>
                        <label for="SearchPWEmailEmail" class="blind">이메일</label>
                        <input type="email" name="SearchPWEmailEmail" id="SearchPWEmailEmail" placeholder="이메일" required>
                    </div>
                    <button type="submit" class="btn1">비밀번호 찾기</button>
                    <a href="#" class="phonePWFind btn3">휴대폰 번호로 찾기</a>
                </fieldset>
            </form>
        </div>
        <!-- // 이메일로 비밀번호 찾기 -->

        <div class="login__inner SearchPWPhone">
            <h2>비밀번호 찾기(휴대폰)</h2>
            <form action="#" method="post">
                <fieldset>
                    <legend class="blind">로그인 입력 폼</legend>
                    <div>
                        <label for="SearchPWPhoneID" class="blind">아이디</label>
                        <input type="text" name="SearchPWPhoneID" id="SearchPWPhoneID" placeholder="아이디" required>
                    </div>
                    <div>
                        <label for="SearchPWPhoneName" class="blind">이름</label>
                        <input type="text" name="SearchPWPhoneName" id="SearchPWPhoneName" placeholder="이름" required>
                    </div>
                    <div>
                        <label for="SearchPWPhonePhone" class="blind">휴대폰 번호</label>
                        <input type="text" name="SearchPWPhonePhone" id="SearchPWPhonePhone" placeholder="휴대폰 번호" required>
                    </div>
                    <button type="submit" class="btn1">비밀번호 찾기</button>
                    <a href="#" class="emailPWFind btn3">이메일로 찾기</a>
                </fieldset>
            </form>
        </div>
        <!-- // 휴대폰 번호로 비밀번호 찾기 -->

        <div class="login__inner SearchPWResult">
            <h2>비밀번호 찾기 결과</h2>
            <div class="result__text">
                <p class="result">
                    임시 비밀 번호는 <br>
                    <span>asjefoisjeoifisj</span> <br>
                    입니다.
                </p>
            </div>

            <div class="login__result">
                <div class="join btn2 fs">로그인</div>
                <div class="resetPW btn3 fs">비밀번호 재설정</div>
            </div>
        </div>
        <!-- // 비밀번호 찾기 결과 -->

        <div class="login__inner ChangePW">
            <h2>비밀번호 재설정</h2>
            <form action="" method="post">
                <fieldset>
                    <legend class="blind">로그인 입력 폼</legend>
                    <div>
                        <label for="password" class="blind">비밀번호</label>
                        <input type="password" name="password" id="password" placeholder="새 비밀번호" required>
                    </div>
                    <div>
                        <label for="passwordCheck" class="blind">비밀번호 재설정</label>
                        <input type="password" name="passwordCheck" id="passwordCheck" placeholder="새 비밀번호 확인" required>
                    </div>
                    <div class="pwd__btn">
                        <button type="submit" class="change btn1">변경하기</button>
                        <a href="#" class="cancel btn2">취소하기</a>
                    </div>
                </fieldset>
            </form>
        </div>
        <!-- // 비밀번호 변경 -->

        <div class="login__inner ChangePWResult">
            <h2>비밀번호 재설정</h2>
            <div class="result__text">
                <p class="result">
                    비밀번호 재설정이 <br>
                    완료 되었습니다!
                </p>
            </div>

            <div class="login__result">
                <div class="login btn2 fs">로그인</div>
                <div class="home btn3 fs"><a href="#">홈으로</a></div>
            </div>
        </div>
        <!-- // 비밀번호 변경 완료 -->

        <div class="login__inner AuthEmail">
            <h2>이메일 인증</h2>
            <form action="passwordFind_Email" method="post">
                <fieldset>
                    <legend class="blind">이메일 입력 폼</legend>
                    <div>
                        <label for="email" class="blind">이메일</label>
                        <input type="email" name="email" id="email" placeholder="이메일" required>
                    </div>
                    <a href="#c" class="btn3">인증번호 발송</a>
                    <p class="userCheckNum"></p>
                    <!-- <input type="hidden" name="emailCheckNum" id="emailCheckNum"> -->
                    <div>
                        <label for="EmailCheckNumber" class="blind">인증번호</label>
                        <input type="number" name="EmailCheckNumber" id="EmailCheckNumber" placeholder="인증번호" required>
                        <p class="timeLimit"></p>
                    </div>
                    <button type="submit" class="btn1">제출</button>
                    <div class="btn3 otherAuthBtnP">휴대폰으로 인증하기</div>
                </fieldset>
            </form>
        </div>
        <!-- // 이메일 본인인증 -->

        <div class="login__inner AuthEmailResult">
            <h2>이메일 인증완료</h2>
            <form action="http://kkk5993.dothome.co.kr/php/login/join.php" method="post">
                <fieldset>
                    <legend class="blind">이메일 인증</legend>
                    <p class="checkDesc">이메일 인증이<br>완료되었습니다!</p>
                    <button type="submit" class="btn1">확인</button>
                </fieldset>
            </form>
        </div>
        <!-- // 이메일 본인인증 완료 -->

        <div class="login__inner AuthPhone">
            <h2>휴대폰 인증</h2>
            <form action="passwordFind_Phone" method="post">
                <fieldset>
                    <legend class="blind">휴대폰 번호 입력 폼</legend>
                    <div>
                        <label for="phoneNumber" class="blind">휴대폰</label>
                        <input type="text" name="phoneNumber" id="phoneNumber" placeholder="휴대폰 번호" required>
                    </div>
                    <a href="#c" class="btn3">인증번호 발송</a>
                    <p class="userCheckNum"></p>
                    <!-- <input type="hidden" name="phoneCheckNum" id="phoneCheckNum"> -->
                    <div>
                        <label for="PhoneCheckNumber" class="blind">인증번호</label>
                        <input type="number" name="PhoneCheckNumber" id="PhoneCheckNumber" placeholder="인증번호" required>
                        <p class="timeLimit"></p>
                    </div>
                    <button type="submit" class="btn1">제출</button>
                    <div class="btn3 otherAuthBtnE">이메일로 인증하기</div>
                </fieldset>
            </form>
        </div>
        <!-- // 휴대폰 본인인증 -->

        <div class="login__inner AuthPhoneResult">
            <h2>휴대폰 인증완료</h2>
            <form action="http://kkk5993.dothome.co.kr/php/login/join.php" method="post">
                <fieldset>
                    <legend class="blind">휴대폰 인증</legend>
                    <p class="checkDesc">휴대폰 인증이<br>완료되었습니다!</p>
                    <button type="submit" class="btn1">확인</button>
                </fieldset>
            </form>
        </div>
        <!-- // 휴대폰 본인인증 완료 --> 

        <div class="login__close">
            <span class="ir">닫기버튼입니다.</span>
        </div>
    </section>
</div>

<script>
    // 클릭 막기
    let stopClick = false;
    let stopClick2 = false;
    // 서브밋 막기
    let stopSubmit = false;
    let stopSubmit2 = false;

    // 01번째 섹션
    // 로그인 관련 폼들 선택자
    const LoginMain = document.querySelector(".login__inner.LoginMain");
    const SearchIDPhone = document.querySelector(".login__inner.SearchIDPhone");
    const SearchIDEmail = document.querySelector(".login__inner.SearchIDEmail");
    const SearchIDResult = document.querySelector(".login__inner.SearchIDResult");
    const SearchPWEmail = document.querySelector(".login__inner.SearchPWEmail");
    const SearchPWPhone = document.querySelector(".login__inner.SearchPWPhone");
    const SearchPWResult = document.querySelector(".login__inner.SearchPWResult");
    const ChangePW = document.querySelector(".login__inner.ChangePW");
    const ChangePWResult = document.querySelector(".login__inner.ChangePWResult");
    const AuthEmail = document.querySelector(".login__inner.AuthEmail");
    const AuthEmailResult = document.querySelector(".login__inner.AuthEmailResult");
    const AuthPhone = document.querySelector(".login__inner.AuthPhone");
    const AuthPhoneResult = document.querySelector(".login__inner.AuthPhoneResult");

    // 로그인 관련 선택자를 배열로 모아놓음
    const array = [
        LoginMain,
        SearchIDPhone,
        SearchIDEmail,
        SearchIDResult,
        SearchPWEmail,
        SearchPWPhone,
        SearchPWResult,
        ChangePW,
        ChangePWResult,
        AuthEmail,
        AuthEmailResult,
        AuthPhone,
        AuthPhoneResult,
    ];

    // 로그인 버튼
    const loginBtn = document.querySelector(".loginBtn");
    const loginBg = document.querySelector("#login__wrap");
    const loginPopup = document.querySelector("#login__box");
    const loginClose = document.querySelector(".login__close");

    if(loginBtn){
        // 로그인 버튼을 클릭했을 때
        loginBtn.addEventListener("click", () => {
            loginBg.classList.add("open");
            loginPopup.classList.add("open");
            
            array.forEach((form) => {
                form.style.display = 'none';
            });
            LoginMain.style.display = 'block';
        });
    }

    SearchIDResult.querySelector('.join').addEventListener('click', () => {
        array.forEach((form) => {
            form.style.display = 'none';
        });
        LoginMain.style.display = 'block';
    });
    
    // X 버튼을 클릭했을 때
    loginClose.addEventListener("click", () => {
        stopClick = false;
        stopClick2 = false;
        stopSubmit = false;
        stopSubmit2 = false;

        document.querySelector('.AuthEmail form fieldset input#email').disabled = false;
        document.querySelector('.AuthPhone form fieldset input#phoneNumber').disabled = false;
        loginBg.classList.remove("open");
        loginPopup.classList.remove("open");
        array.forEach((form) => {
            form.style.display = 'none';
        });
        
        LoginMain.style.display = 'block';
        clearTimeLimit();
    });

    // 비밀번호 찾기 버튼 01
    const findPW = document.querySelectorAll('.findPW');
    findPW.forEach((el) => {
        el.addEventListener('click', () => {
            array.forEach((form) => {
                form.style.display = 'none';
            });
            SearchPWEmail.style.display = 'block';
        });
    });

    // 비밀번호 찾기 버튼 02
    const pwFind = document.querySelectorAll('.pwFind');
    pwFind.forEach(el => {
        el.addEventListener('click', () => {
            array.forEach((form) => {
                form.style.display = 'none';
            });
            SearchPWEmail.style.display = 'block';
        });
    });

    
    // 서브 로그인 - 아직 미구현
    const subLogin = document.querySelector('.subLogin');
    subLogin.addEventListener('click', () => {
        alert("기다리세요");
    });
    
    // 아이디찾기
    const findID = document.querySelector('.findID');
    findID.addEventListener('click', () => {
        array.forEach((form) => {
            form.style.display = 'none';
        });
        SearchIDPhone.style.display = 'block';
    });

    // 폰으로 찾기 버튼
    const phoneFind = document.querySelector('.phoneFind');
    phoneFind.addEventListener('click', () => {
        array.forEach((form) => {
            form.style.display = 'none';
        });
        SearchIDPhone.style.display = 'block';
    });

    // 이메일로 찾기 버튼
    const emailFind = document.querySelector('.emailFind');
    emailFind.addEventListener('click', () => {
        array.forEach((form) => {
            form.style.display = 'none';
        });
        SearchIDEmail.style.display = 'block';
    });

    // 비밀번호 찾기 버튼 (phone)
    const emailPWFind = document.querySelector('.emailPWFind');
    emailPWFind.addEventListener('click', () => {
        array.forEach((form) => {
            form.style.display = 'none';
        });
        SearchPWEmail.style.display = 'block';
    }); 

    // 비밀번호 찾기 버튼 (email)
    const phonePWFind = document.querySelector('.phonePWFind');
    phonePWFind.addEventListener('click', () => {
        array.forEach((form) => {
            form.style.display = 'none';
        });
        SearchPWPhone.style.display = 'block';
    });

    // 휴대폰 번호로 인증하기 버튼(본인인증)
    const otherAuthBtnP = document.querySelector('.otherAuthBtnP');
    otherAuthBtnP.addEventListener('click', () => {
        clearTimeLimit()
        array.forEach((form) => {
            form.style.display = 'none';
        });
        AuthPhone.style.display = 'block';
    });

    // 이메일로 인증하기 버튼(본인인증)
    const otherAuthBtnE = document.querySelector('.otherAuthBtnE');
    otherAuthBtnE.addEventListener('click', () => {
        clearTimeLimit()
        array.forEach((form) => {
            form.style.display = 'none';
        });
        AuthEmail.style.display = 'block';
    });

    // 비밀번호 찾기 완료 후 로그인
    const pwFindResultLoginBtn = document.querySelector('.SearchPWResult .join');
    pwFindResultLoginBtn.addEventListener('click', () => {
        array.forEach((form) => {
            form.style.display = 'none';
        });
        LoginMain.style.display = 'block';
    });
    // 아이디 찾기 완료 후 로그인
    const idFindResultLoginBtn = document.querySelector('.SearchIDResult .join');
    idFindResultLoginBtn.addEventListener('click', () => {
        array.forEach((form) => {
            form.style.display = 'none';
        });
        LoginMain.style.display = 'block';
    });
    
    // 비밀번호 찾기 완료 후 재설정
    const pwFindResultResetPWBtn = document.querySelector('.SearchPWResult .resetPW');
    pwFindResultResetPWBtn.addEventListener('click', () => {
        array.forEach((form) => {
            form.style.display = 'none';
        });
        ChangePW.style.display = 'block';
    });

    // 비밀번호 재설정에서 취소하기 버튼
    const pwChangeCancelBtn = document.querySelector('.ChangePW .cancel');
    pwChangeCancelBtn.addEventListener('click', () => {
        array.forEach((form) => {
            form.style.display = 'none';
        });
        LoginMain.style.display = 'block';
    });

    // 비밀번호 재설정 완료 후 로그인
    const pwChangeResultLoginlBtn = document.querySelector('.ChangePWResult .login');
    pwChangeResultLoginlBtn.addEventListener('click', () => {
        array.forEach((form) => {
            form.style.display = 'none';
        });
        LoginMain.style.display = 'block';
    });

    // 비밀번호 재설정 완료 후 홈으로
    const pwChangeResultHomeBtn = document.querySelector('.ChangePWResult .home');
    pwChangeResultHomeBtn.addEventListener('click', () => {
        location.href = "http://kkk5993.dothome.co.kr/php/main/category_R.php";
    });


    // 02번째 섹션
    const doAuthEmail = document.querySelector('.AuthEmail form fieldset a'); // 이메일로 본인인증 하기 버튼
    const doAuthPhone = document.querySelector('.AuthPhone form fieldset a'); // 휴대폰번호로 본인인증 하기 버튼
    // const emailCheckNum = document.querySelector('.AuthEmail input#emailCheckNum');
    const CheckP = document.querySelectorAll('p.userCheckNum');    //인증번호 출력 부분
    const timeLimit = document.querySelectorAll('p.timeLimit');    //제한시간 출력 부분
    const AuthEmailBtn = document.querySelector('.AuthEmail button'); // 이메일 본인인증 제출 버튼
    const AuthEmailForm = document.querySelector('.AuthEmail form'); // 이메일 본인인증 폼
    const AuthPhoneBtn = document.querySelector('.AuthPhone button'); // 휴대폰번호 본인인증 제출 버튼
    const AuthPhoneForm = document.querySelector('.AuthPhone form'); // 휴대폰번호 본인인증 폼

    let x;
    //setTimeLimit() 시간제한 생성 함수
    function setTimeLimit(num){
        let i = num;
        let time = 120; // 기준시간(최대)
        let min = "";   //분
        let sec = "";   //초

        x = setInterval(() => {
            min = parseInt(time/60);
            sec = time%60;
            if(sec < 10){
                sec = `0${sec}`;
            }

            timeLimit[i].innerText = `${min}:${sec}`;
            time--;

            if( time < 0) {
                clearInterval(x);
                timeLimit[i].innerText = "시간초과";
                stopClick = false;
                stopClick2 = false;
            }
        }, 1000);
    }

    function clearTimeLimit(){
        for(let i in CheckP){
            clearInterval(x);
            timeLimit[i].innerText = "";
            CheckP[i].innerHTML = "";
        }
    }

    //이메일 인증하기 버튼을 누르면 랜덤 인증번호가 나오게 + 시간제한
    doAuthEmail.addEventListener("click", ()=>{
        console.log(stopClick)
        if(stopClick) return;
        stopClick = true;

        let inputEmailTxt = document.querySelector('.AuthEmail form fieldset input#email').value;
        if(inputEmailTxt == "") {
            alert("이메일을 입력해 주세요!");
            stopClick = false;
            document.querySelector('.AuthEmail form fieldset input#email').disabled = false;
            return;
        }

        clearInterval(x);
        document.querySelector('.AuthEmail form fieldset input#email').disabled = true;
        let randomNum = Math.floor(Math.random() * 100000);
        console.log("here")

        // 이메일이 올바르게 작성되었는지 확인
        let reg_email = /^([0-9a-zA-Z_\.-]+)@([0-9a-zA-Z_-]+)(\.[0-9a-zA-Z_-]+){1,2}$/;
        if(!reg_email.test(inputEmailTxt)){   
            alert("올바른 이메일을 입력해 주세요.");
            stopClick = false;
        }             
        else{           
            CheckP[0].innerHTML = `인증번호는 : <strong>${randomNum}</strong>`;
            // emailCheckNum.value = `${randomNum}`;
            setTimeLimit(0);  
        }

        function AuthCheckFnc(e) {
            if(stopSubmit) return;
            stopSubmit = true;
            e.preventDefault();
            let ECheckNumber = document.querySelector('.AuthEmail form fieldset input#EmailCheckNumber').value;
            if(ECheckNumber == randomNum){
                array.forEach((form) => {
                form.style.display = 'none';
                });
                AuthEmailResult.style.display = 'block';
            } else {
                alert("인증번호를 정확하게 입력해 주세요!");
            }
            stopSubmit = false;
        }
        // 제출버튼 클릭 후 인증번호가 일치하는지 확인
        AuthEmailBtn.addEventListener("click", ()=>{
            AuthEmailForm.addEventListener("submit", AuthCheckFnc);
        });
        AuthEmailForm.removeEventListener('submit',AuthCheckFnc);
    });

    //휴대폰 인증하기 버튼을 누르면 랜덤 인증번호가 나오게 + 시간제한
    doAuthPhone.addEventListener("click", ()=>{
        if(stopClick2) return;
        stopClick2 = true;

        // 번호란이 공백인지 확인
        let inputPhoneTxt = document.querySelector('.AuthPhone form fieldset input#phoneNumber').value;
        if(inputPhoneTxt == ""){
            alert("휴대폰 번호를 입력해 주세요!");
            document.querySelector('.AuthPhone form fieldset input#phoneNumber').disabled = false;
            stopClick2 = false;
        }
        clearInterval(x);

        document.querySelector('.AuthPhone form fieldset input#phoneNumber').disabled = true;
        let randomNum = Math.floor(Math.random() * 100000);
        
        let reg_phone = /^(010|011|016|017|018|019)-[0-9]{3,4}-[0-9]{4}$/;
        if(!reg_phone.test(inputPhoneTxt)){   
            alert("올바른 휴대폰 번호를 입력해 주세요.");
            stopClick2 = false;
        }             
        else{           
            CheckP[1].innerHTML = `인증번호는 : <strong>${randomNum}</strong>`;
            setTimeLimit(1);  
        }

        function AuthCheckFnc2(e) {
            if(stopSubmit2) return;
            stopSubmit2 = true;
            e.preventDefault();
            let PCheckNumber = document.querySelector('.AuthPhone form fieldset input#PhoneCheckNumber').value;
            if(PCheckNumber == randomNum){
                // alert("인증번호가 일치합니다!");
                array.forEach((form) => {
                form.style.display = 'none';
                });
                AuthPhoneResult.style.display = 'block';
            } else {
                console.log("phone")
                alert("휴대폰 - 인증번호를 정확하게 입력해 주세요!");
            }
            stopSubmit2 = false;
        }
        // 제출버튼 클릭 후 인증번호가 일치하는지 확인
        AuthPhoneBtn.addEventListener("click", ()=>{
            AuthPhoneForm.addEventListener("submit", AuthCheckFnc2);
        });
        AuthPhoneForm.removeEventListener('submit',AuthCheckFnc2);
    });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    let mySessionID = 0;
    // ajax 통신 (아이디, 비밀번호 찾기 & 비밀번호 재설정)
    const IDForm = document.querySelector(".SearchIDEmail form"); // 아이디 찾기 이메일
    const IDForm2 = document.querySelector(".SearchIDPhone form"); // 아이디 찾기 폰
    const PWForm = document.querySelector(".SearchPWEmail form"); // 비번 찾기 이메일
    const PWForm2 = document.querySelector(".SearchPWPhone form"); // 비번 찾기 폰
    const PWChangeForm = document.querySelector(".ChangePW form"); // 비번 재설정

    // 비번 재설정
    PWChangeForm.addEventListener('submit', (e) => {
        e.preventDefault();
        if(!PWChecking()) {
            alert("비밀번호는 공백없이 특수문자와 숫자를 포함하여 8~20자 이내로 작성해주세요");
            return;
        }
        PWChange();
    });

    // 비밀번호 유효성 검사
    function PWChecking() {
        const getYouPass = $('#password').val();
        const getYouPassNum = getYouPass.search(/[0-9]/g);
        const getYouPassEng = getYouPass.search(/[a-z]/gi);
        const getYouPassSpe = getYouPass.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);

        if (getYouPass.length < 8 || getYouPass.length > 20) {
            return false;
        }
        else if (getYouPass.search(/[\s]/) !== -1) {
            return false;
        }
        else if (getYouPassNum < 0 || getYouPassEng < 0 || getYouPassSpe < 0) {
            return false;
        }
        
        return true;
    }

    function PWChange() {
        let password = $('#password').val();
        let passwordCheck = $('#passwordCheck').val();

        if(password !== passwordCheck) {
            alert("비밀번호가 일치하지 않습니다.");
            return;
        }

        $.ajax({
            type : "POST",
            url  : "http://kkk5993.dothome.co.kr/php/login/PWChange.php",
            data : {"youPass" : password, "mySessionID" : mySessionID},
            dataType : "json",
            success : function(data) {
                if(data.result === "good") {
                    array.forEach((form) => {
                        form.style.display = 'none';
                    });
                    ChangePWResult.style.display = 'block';
                }
                else {
                    alert("변경 실패 - 관리자에게 문의해주세요");
                }
            },
            error : function(request, status, error) {
                console.log("request",request);
                console.log("status",status);
                console.log("error",error);
            }
        });
    }
    
    // 아이디 찾기 이메일
    IDForm.addEventListener('submit', (e) => {
        e.preventDefault();
        IDEmailChecking();
    });

    // 아이디 찾기 폰
    IDForm2.addEventListener('submit', (e) => {
        e.preventDefault();
        IDPhoneChecking();
    });

    function IDPhoneChecking() {
        let youIDPhoneName = $('#SearchIDPhoneName').val();
        let youIDPhonePhone = $('#SearchIDPhonePhone').val();
        if(youIDPhoneName ==='') {
            alert("공백입니다.");
            return;
        }
        $.ajax({
            type : "POST",
            url  : "http://kkk5993.dothome.co.kr/php/login/IDFind.php",
            data : {"youName" : youIDPhoneName, "youPhone" : youIDPhonePhone, "type" : "phoneCheck"},
            dataType : "json",
            success : function(data) {
                if(data.result.includes("good")) {
                    array.forEach((form) => {
                        form.style.display = 'none';
                    });
                    SearchIDResult.querySelector('span').innerText = data.result.replace("good", '');
                    SearchIDResult.style.display = 'block';
                }
                else {
                    alert("그런 정보가 없습니다.");
                }
            },
            error : function(request, status, error) {
                console.log("request",request);
                console.log("status",status);
                console.log("error",error);
            }
        });
    }
    
    function IDEmailChecking() {
        let youIDEmailName = $('#SearchIDEmailName').val();
        let youIDEmailEmail = $('#SearchIDEmailEmail').val();
        if(youIDEmailName ==='') {
            alert("공백입니다.");
            return;
        }
        $.ajax({
            type : "POST",
            url  : "http://kkk5993.dothome.co.kr/php/login/IDFind.php",
            data : {"youName" : youIDEmailName, "youEmail" : youIDEmailEmail, "type" : "emailCheck"},
            dataType : "json",
            success : function(data) {
                if(data.result.includes("good")) {
                    array.forEach((form) => {
                        form.style.display = 'none';
                    });
                    SearchIDResult.querySelector('span').innerText = data.result.replace("good", '');
                    SearchIDResult.style.display = 'block';
                }
                else {
                    alert("그런 정보가 없습니다.");
                }
            },
            error : function(request, status, error) {
                console.log("request",request);
                console.log("status",status);
                console.log("error",error);
            }
        });
    }

    // 비번 찾기 이메일
    PWForm.addEventListener('submit', (e) => {
        e.preventDefault();
        pwEmailChecking();
    });

    // 비번 찾기 폰
    PWForm2.addEventListener('submit', (e) => {
        e.preventDefault();
        pwPhoneChecking();
    });

    function pwEmailChecking() {
        let youID = $('#SearchPWEmailID').val();
        let youName = $('#SearchPWEamilName').val();
        let youEmail = $('#SearchPWEmailEmail').val();

        if(youName ==='') {
            alert("공백입니다.");
            return;
        }

        $.ajax({
            type : "POST",
            url  : "http://kkk5993.dothome.co.kr/php/login/passwordFind.php",
            data : {"youID" : youID, "youName" : youName, "youEmail" : youEmail, "type" : "emailCheck"},
            dataType : "json",
            success : function(data) {
                if(data.result.includes("good")) {
                    array.forEach((form) => {
                        form.style.display = 'none';
                    });
                    SearchPWResult.querySelector('span').innerText = data.result.replace("good", "");
                    SearchPWResult.style.display = 'block';
                    mySessionID = data.result.replace("good", "").replace("tempPass", "");
                }
                else {
                    alert("그런 정보가 없습니다.");
                }
            },
            error : function(request, status, error) {
                console.log("request",request);
                console.log("status",status);
                console.log("error",error);
            }
        });
    }

    function pwPhoneChecking() {
        let youID = $('#SearchPWPhoneID').val();
        let youName = $('#SearchPWPhoneName').val();
        let youPhone = $('#SearchPWPhonePhone').val()
          
        if(youName ==='') {
            alert("공백입니다.");
            return;
        }

        $.ajax({
            type : "POST",
            url  : "http://kkk5993.dothome.co.kr/php/login/passwordFind.php",
            data : {"youID" : youID, "youName" : youName, "youPhone" : youPhone, "type" : "phoneCheck"},
            dataType : "json",
            success : function(data) {
                if(data.result.includes("good")) {
                    array.forEach((form) => {
                        form.style.display = 'none';
                    });
                    SearchPWResult.querySelector('span').innerText = data.result.replace("good", '');
                    SearchPWResult.style.display = 'block';
                    mySessionID = data.result.replace("good", "").replace("tempPass", "");
                }
                else {
                    alert("그런 정보가 없습니다.");
                }
            },
            error : function(request, status, error) {
                console.log("request",request);
                console.log("status",status);
                console.log("error",error);
            }
        });
    }
</script>