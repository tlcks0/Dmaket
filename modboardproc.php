<?php
include_once('dbconn.php');

$no = $_POST['no'];
$title = $_POST['title'];
$content = $_POST['note'];

$sql = "update board set title = '$title', content = '$content' where no = '$no'";

if(!$conn->query($sql))
    die('게시글 변경 중에 오류가 발생했습니다. '.$conn->error);
echo "<script>alert('선택한 게시글을 수정하였습니다.'); location.href='showboard.php'; </script>";

?>