<?php
function uploadFile() {
	# 파일을 저장할 폴더 지정
	$target_dir = 'uploads/';  // 현재 폴더에 있는 하위 폴더 uploads
	$target_file = $target_dir . basename($_FILES['att']['name']); 

	# 파일 체크
	$upload_ok = 1;
	if($_FILES['att']['size'] > 500000000) {  // 파일크기가 500M 초과이면
		echo "파일 크기가 500M를 넘었습니다.";
		$upload_ok = 0;
	}
	if($upload_ok == 0) {
		echo "파일 업로드 오류";
		return 'ERROR';
	}
	else {
		if(move_uploaded_file($_FILES['att']['tmp_name'], $target_file)) {
			echo "파일 ".basename($_FILES['att']['name']) . "을 업로드했습니다.";
			return basename($_FILES['att']['name']);
		}
		else {
			echo "임시파일을 이동중에 오류가 발생했습니다";
			return 'ERROR';
		}
	}	
}

session_start();
include_once('dbconn.php');
$userid = $_SESSION['userid'];
$wdate = $_POST['wdate'];
$title = $_POST['title'];
$note = $_POST['note'];
$att = uploadFile();    // $att = 업로드한 파일명
if($att == "ERROR") $att = '';

$sql = "insert into board(userid,wdate,title,content,attachment) 
			values('$userid','$wdate','$title','$note','$att')";
if($conn->query($sql)) {
    echo "<script>alert('게시글이 저장되었습니다.'); location.href='writeboard.php'</script>";
}
else {
    echo "게시글 저장에 오류가 발생했습니다. <br>";
    echo $conn->error;
}
?>
