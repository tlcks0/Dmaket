<!doctype html>
<html>
	<head>
		<title>Dmaket</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
		</style>
	</head>
	<body>
		<?php
			session_start();
			$logged = false;
			if(isset($_SESSION['uid'])) {  // 세션에 uid 키가 정의되어 있으면 
				$uid = $_SESSION['uid'];
				$uname = $_SESSION['uname'];
				//echo "$uid : $uname<br>";
				$logged = true;
			}
			#1. Database connection
			include_once('dbconn.php');
			// 장바구니 검색
			if($logged) {
			$sql = "select count(*) rowcnt from cart where email = '$uid'";
			$result = $conn->query($sql);
			//$row = $result->fetch_array(MYSQLI_NUM);
			$row = $result->fetch_assoc();
			}
		?>
		<div class="topnav">
		<?php
			if(!$logged) {
				echo "<a href='signup.html'>회원가입</a>";
				echo "<a href='signin.html'>로그인</a>";
			}
			else {
				echo "<a href=''>{$uname}님 환영합니다.</a>";
				echo "<a href='signout.php'>로그아웃</a>";
				echo "<a href='signmodify.php'>회원정보수정</a>";
				echo "<a href='signdel.php'>회원탈퇴</a>";
				echo "<a href='showcart.php'>장바구니(".$row['rowcnt'].")</a>";
				echo "<a href='showorder.php'>주문내역</a>";
				echo "<a href='writeboard.php'>글작성</a>";
			}
		?>
		</div>
		<h1>Dmaket</h1>
	<?php	
	#2. SELECT SQL문 : mypizza 테이블의 전체 레코드 검색하는 구문
	$sql = "select * from mypizza";
	#3. SQL 실행하기
	$result = $conn->query($sql); 
	#4. 실행결과 레코드들을 화면에 보이기
	if(!$result)
		die('피자 데이터 검색에 오류가 발생했습니다. Error : '.$conn->error);
	?>
	<?php
	while($row = $result->fetch_array(MYSQLI_NUM)) {
	?>
	<div class="card card-1">
		<a href="addcart.php?pizza=<?=$row[1]?>&lprice=<?=$row[2]?>&sprice=<?=$row[3]?>">
			<img src="images/<?=$row[4]?>"></a>
		<div class="">
			<h3><?=$row[1]?></h3>
			<h3><?=$row[2]?></h3>
			<h3><?=$row[3]?></h3>
		</div>
	</div>
	<?php } //<?php} 안됨 ?>
		
	</body>
</html>
