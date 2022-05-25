<?php
#0. 세션 시작하기
session_start();    // 세션 처리 시작하기. 맨 첫줄에 있어야 함.
#1. DB 접속하기
include_once('dbconn.php');
#2. 입력 폼 데이터 읽어오기
$userid = $_POST['userid'];
$pwd = $_POST['pwd'];
#3. SELECT SQL 구문 작성하기
$sql = "select * from user
        where userid = '$userid' and pwd = '$pwd'";
#4. SQL 실행하기
$result = $conn->query($sql); // 검색되면 레코드 한 건이 $result에 저장됨.
if(isset($result) && $result->num_rows > 0) {
    $row = $result->fetch_assoc();  // 검색된 레코드 하나를 연관배열 형태로 받아옴.
    // 세션 데이터 생성
   $_SESSION['userid'] = $userid;  // user id 값을 세션 키 uid에 저장.
    $_SESSION['name'] = $row['name']; // 앞에있는건 세션키 뒤에껀 컬럼명(uname)
    echo "<script>location.href='index.php'</script>";
}
else
    echo "아이디 또는 패스워드가 맞지 않습니다.";
?>