<?php
session_start();
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

$sql = "update user set pwd = '$pwd', name = '$name', email = '$email', 
        phone = '$phone', ADDRESS_ZIPCODE = '$ADDRESS_ZIPCODE', ADDRESS_ROAD = '$ADDRESS_ROAD',
        ADDRESS_DETAIL = '$ADDRESS_DETAIL', ADDRESS_SUBDETAIL = '$ADDRESS_SUBDETAIL'
        where userid = '$userid'";
#4. SQL 실행하기
if($conn->query($sql)) {
    echo "회원정보수정 성공!! <a href='index.php'>Dmaket</a>";
    $_SESSION['name'] = $name;    // 회원이름 변경된 것을 세션 데이터로 수정
}
else 
    echo "회원정보수정 중에 오류가 발생했습니다.";
?>