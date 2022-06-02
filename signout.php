<?php
session_start();
# 세션에 등록한 데이터를 제거
session_destroy();  // userid, name 데이터 삭제
echo "<script>history.go(-1)</script>";
?>