<?php
#1.DB 연결
include_once('dbconn.php');
#2.데이터 읽어오기
$no = $_GET['no'];
#3.DELETE SQL 작성
$sql = "delete from board where no = $no"; 
#4.SQL 실행
    if(!$conn->query($sql))
        die('삭제 중에 오류가 발생했습니다. '.$conn->error);

echo "<script>alert('선택한 게시글을 삭제하였습니다.'); location.href='showboard.php'; </script>";

?>