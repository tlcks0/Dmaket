<?php
#. 파일 다운로드
if(isset($_REQUEST['file'])) {
	$file = urldecode($_REQUEST['file']);
	$filepath = 'uploads/'.$file;
	
	if(file_exists($filepath)) {
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
		header('Content-Length: '.filesize($filepath));
		readfile($filepath); // 파일의 내용을 읽어옴
		flush();   // 전송해 줌
		exit;
	}
}

?>