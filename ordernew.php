<!DOCTYPE html>
<html>
    <title>물품 배송 주문</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
    <link href="bootstrap.min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="signup.js"></script>
   
    <!-- 폼 시작 -->
    <body>

    <?php
    session_start();
    $userid = $_SESSION['userid'];
    $name = $_SESSION['name'];
    # cart에 담긴 물품의 총액을 구하기
    include_once('dbconn.php');
    $sql= "SELECT SUM(price) amount FROM cart WHERE userid = 'user1'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();  // $row['amount']
    ?>    
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <p class="navbar-brand" style="font-size: 150%;">Dmaket</p>
        </nav>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-30">
                <div class="card">
                <div class="card-header font-weight-bold">물품 배송 주문</div>
                <div class="card-body">
                <form action="ordernewproc.php" method="POST">
                    <div class="form-group col-30">
                        <label for="userid" class="font-weight-bold">주문자</label>
                        <div class="form-row">
                            <div class="input-group col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span class="fas fa-user"></span></span>
                                
                                <input type="text" class="form-control ime-mode" placeholder="아이디" name="userid" id="userid" value="<?=$userid?>"readonly
                                    pattern=".*(?=.{5,15})(?=.*[0-9a-zA-Z]).*" maxlength="15" required>
                            </div>
                        </div>
                    </div>
                    <label for="pwd" class="font-weight-bold">주문번호</label>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="input-group col">
                                <input type="text" class="form-control pwbox" placeholder="주문번호" name="ordno"maxlength="20" required>
                            </div>
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
                    <label for="pwd" class="font-weight-bold">주문금액</label>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="input-group col">
                                <div class="input-group-prepend">
                                </div>
                                <input type="text" class="form-control pwbox" name="amount" value="<?=$row['amount']?>" readonly>
                            </div>
                        </div>
                    </div>
                    <label for="pwd" class="font-weight-bold">배달료</label>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="input-group col">
                                <div class="input-group-prepend">
                                </div>
                                <input type="text" class="form-control pwbox" name="delamt" value="3000" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- 완료버튼 -->
                    <button type="submit" class="col-12 btn btn-primary" id="submit">
                        <span class="fas fa-check"></span>
                        완료
                    </button>
                </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>
