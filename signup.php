<?php
#1. DB 접속하기
include_once('dbconn.php');
#2. 입력 폼 데이터 읽어오기
$userid = $_POST['userid'];
$pwd = $_POST['pwd'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$ADDRESS_ZIPCODE = $_POST['ADDRESS_ZIPCODE'];
$ADDRESS_ROAD = $_POST['ADDRESS_ROAD'];
$ADDRESS_DETAIL = $_POST['ADDRESS_DETAIL'];
$ADDRESS_SUBDETAIL = $_POST['ADDRESS_SUBDETAIL'];

#3. INSERT SQL 구문 작성하기
$sql = "insert into user values('$userid','$pwd','$name', '$email', $phone, '$ADDRESS_ZIPCODE',
                                '$ADDRESS_ROAD', '$ADDRESS_DETAIL', '$ADDRESS_SUBDETAIL')";
#4. SQL 실행하기
if($conn->query($sql)) 
    echo "회원가입 성공!! <a href='index.php'>Dmaket</a>";
else echo "회원가입 중에 오류가 발생했습니다.";
?>
