<?php
# 업로드할 파일명 입력을 체크
if(!isset($_FILES['imgfile']) || $_FILES['imgfile']['error'] != 0) {
	die('오류: 파일을 선택하지 않았거나 서버 전송 중에 오류가 발생했습니다.');
}

# 파일을 저장할 폴더 지정
$target_dir = 'uploads/';  // 현재 폴더에 있는 하위 폴더 uploads
$target_file = $target_dir.basename($_FILES['imgfile']['name']); 

# 파일 체크
$upload_ok = 1;
if(file_exists($target_file)) {
	echo "같은 파일명을 가지는 파일이 존재합니다.";
	$upload_ok = 0;
}
if($_FILES['imgfile']['size'] > 500000000) {  // 파일크기가 500M 초과이면
	echo "파일 크기가 500M를 넘었습니다.";
	$upload_ok = 0;
}
$imgtype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // 확장자 가져옴
if($imgtype != 'jpg' && $imgtype != 'jpeg' && $imgfile != 'png') {
	echo "파일 종류는 jpg, jpeg, png 여야 합니다.";
	$upload_ok = 0;	
}
if($upload_ok == 0) {
	echo "파일 업로드 오류";
}
else {
	if(move_uploaded_file($_FILES['imgfile']['tmp_name'], $target_file)) {
		echo "파일 ".basename($_FILES['imgfile']['name']) . "을 업로드했습니다.";
	}
	else
		echo "임시파일을 이동중에 오류가 발생했습니다";
}
?>