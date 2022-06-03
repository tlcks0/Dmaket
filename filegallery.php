<!doctype html>
<html>
<head>
	<title>File Gallery</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="D.jpg" type="image/x-icon" />
	<style>
		.box {
			display: inline-block;
			text-align: center;
			margin: 0 15px;
		}
	</style>
</head>
<body>
	<h1>Image file gallery</h1>
	<?php
		$images = scandir('uploads/'); // 폴더에 있는 파일, 디렉토리명들을 배열로 생성
		foreach($images as $img) {
			if($img == "." || $img == "..") continue; // . : 현재 디렉토리, .. : 상위 디렉토리 
			echo "<div class='box'>";
			echo "<img src='uploads/$img' width='300'>";
			echo "<p><a href='filedownload.php?file=".urlencode($img)."'>Download</a></p>";
			echo "</div>";
		}
	?>
</body>
</html>