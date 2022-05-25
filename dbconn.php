<?php
# MySQL Database Server connection
$server = "localhost"; // MySQL 서버가 동작하는 호스트의 IP주소 127.0.0.1
$user = "root";
$passwd = "";
$dbname = "dmaket";
// mysqli : MySQL 접속 등을 처리하는 클래스. 접속이 성공하는 접속 정보를 가지는 객체가 생성.
$conn = new mysqli($server, $user, $passwd, $dbname);
if($conn->connect_error)
    //echo "<h3>MySQL Server 접속 오류</h3>";
    die('MySQL Server 접속 오류');
// else echo "<h3>MySQL Server 접속 성공</h3>";
?>