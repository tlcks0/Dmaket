<!DOCTYPE html>
<html>
    <title>회원 가입</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="signup.js"></script>
    <style>
        .imemode [type=text] { 
        -webkit-ime-mode:disabled; 
        -moz-ime-mode:disabled; 
        -ms-ime-mode:disabled; 
        ime-mode:disabled; 
        }
 </style>
    <!-- 폼 시작 -->
    <form action="/" name="signup" method="POST">
        <input type="hidden" name="login" value="signup">
        <!-- 아이디 -->
        <div class="form-group">
            <label for="username" class="font-weight-bold">아이디</label>
            <div class="form-row">
                <div class="input-group col">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><span class="fas fa-user"></span></span>
                    </div>
                    <input type="text" class="form-control ime-mode" placeholder="아이디" name="USERNAME" id="username"
                        pattern=".*(?=.{5,15})(?=.*[0-9a-zA-Z]).*" maxlength="15" required>
                </div>
            </div>
            <small class="form-text text-muted">필수 입력 항목입니다. 5~15자로 입력해주세요.(영문 소문자, 숫자만 사용 가능)</small>
           
        </div>
        <!-- 패스워드 -->
        <label for="pwd" class="font-weight-bold">패스워드</label>
        <div class="form-group">
            <div class="form-row">
                <div class="input-group col">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><span class="fas fa-lock"></span></span>
                    </div>
                    <input type="password" class="form-control pwbox" placeholder="패스워드" name="pwd" id="pwd1" maxlength="20" required>
                    <input type="password" class="form-control pwbox" placeholder="패스워드 확인" id="pwd2" maxlength="20"
                        required>
                </div>
            </div>
            <small class="form-text text-muted">필수 입력 항목입니다. 6~20자로 입력해주세요.(영문, 숫자 조합 필수, 특수문자 사용 가능)</small>
            <div class="alert alert-success" id="pwsuccess">비밀번호가 일치합니다.</div>
            <div class="alert alert-danger" id="pwfail">비밀번호가 일치하지 않습니다.</div>
        </div>
        <div class="form-row">
            <!-- 이름 -->
            <div class="form-group col">
                <label for="name" class="font-weight-bold">이름</label>
                <input type="text" class="form-control" placeholder="홍길동" name="name" id="name" required>
                <small class="form-text text-muted">필수 입력 항목입니다.</small>
            </div>
            <!-- 회원구분 -->
            <div class="form-group col">
                <label for="membertype" class="font-weight-bold">회원구분</label>
                <div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="membertype1" name="MEMBERTYPE" class="custom-control-input" value="user"
                            checked>
                        <label class="custom-control-label" for="membertype1">일반회원</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="membertype2" name="MEMBERTYPE" class="custom-control-input"
                            value="admin">
                        <label class="custom-control-label" for="membertype2">관리자</label></div>
                </div>
            </div>
        </div>
        <div class="form-row">
            <!-- 이메일 -->
            <div class="form-group col">
                <label for="email" class="font-weight-bold">이메일</label>
                <input type="email" class="form-control" name="EMAIL" id="email" placeholder="username@example.com"
                    required>
                <small class="form-text text-muted">필수 입력 항목입니다.</small>
                <small class="form-text text-muted">비밀번호 찾기 시 이용되오니 정확히 입력해주세요.</small>
            </div>
            <!-- 전화번호 -->
            <div class="form-group col">
                <label for="phone" class="font-weight-bold">전화번호</label>
                <input type="tel" onkeyup="inputTelNumber(this)" class="form-control"
                    pattern="[0-9]{2,3}-[0-9]{3,4}-[0-9]{4}" maxlength="13" placeholder="010-1234-5678" name="PHONE"
                    id="phone">
            </div>
        </div>
        <!-- 주소 -->
        <div class="form-group">
            <label for="" class="font-weight-bold">주소</label>
            <div class="form-inline">
                <input type="text" class="form-control" id="postcode" name="ADDRESS_ZIPCODE" placeholder="우편번호"
                    readonly>
                <input type="button" class="btn btn-outline-primary ml-2" onclick="execDaumPostcode()"
                    value="우편번호 찾기"><br>
            </div>
            <input type="text" class="form-control my-1" id="roadAddress" name="ADDRESS_ROAD" placeholder="도로명주소"
                readonly>
            <!-- <input type="text" class="form-control my-1" id="jibunAddress" name="ADDRESS_LAND" placeholder="지번주소"
                readonly>
            <span id="guide" class="form-control my-1" style="color:#999;display:none"></span> -->
            <input type="text" class="form-control my-1" id="detailAddress" name="ADDRESS_DETAIL" placeholder="상세주소">
            <input type="text" class="form-control mt-1" id="extraAddress" name="ADDRESS_SUBDETAIL" placeholder="참고항목"
                readonly>
        </div>
        <!-- 가입버튼 -->
        <button type="submit" class="col-12 btn btn-primary" id="submit">
            <span class="fas fa-check"></span>
            가입
        </button>
    </form>
    

</html>