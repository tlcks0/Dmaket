<?php
session_start();
$userid = $_SESSION['userid'];
#1.DB 연결
include_once('dbconn.php');
#2.데이터 읽어오기
if(!isset($_POST['chk']))
    echo "<script>alert('삭제할 장바구니 항목을 선택하세요.'); history.go(-1); </script>";
else {
$items = $_POST['chk'];
#3.DELETE SQL 작성
foreach($items as $item) {
    $pos = strpos($item, '@');
    $name = substr($item, 0, $pos);
//    echo "$str<br>";
    $size = substr($item, $pos+1, 1);
//    echo "$size<br>";
    $sql = "delete from cart where userid = '$userid' and sellname = '$name'"; 
#4.SQL 실행
    if(!$conn->query($sql))
        die('삭제 중에 오류가 발생했습니다. '.$conn->error);
}
echo "<script>alert('선택한 아이템을 장바구니에서 삭제하였습니다.'); location.href='showcart.php'; </script>";
}
?>