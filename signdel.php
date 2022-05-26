<?php
# 로그인한 사용자의 아이디 가져오기
# user 테이블에서 레코드 삭제하기 : delete
# 세션 제거하기
session_start();
include_once('dbconn.php');
$userid = $_SESSION['userid'];
$sql = "delete from user where userid = '$userid'";
if($conn->query($sql)) {
    echo "회원탈퇴 성공!! <a href='index.php'>Dmaket</a>";
    session_destroy();  // 세션정보 삭제
}
else 
    echo "회원탈퇴 처리 중에 오류가 발생했습니다.";
?>