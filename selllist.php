<!DOCTYPE html>
<html>
<head>
    <title>Dmaket</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>Dmaket 물품</h1>
<?php
#1. database connection
include_once('dbconn.php');
#2. SELECT SQL문 : selllist 테이블의 전체 레코드 검색하는 구문
$sql= "select * from selllist";
#3. SQL 실행하기
$result = $conn->query($sql);

#4. 실행결과 레코드를 화면에 보이기
if(!$result) 
    die('물품 데이터 검색에 오류가 발생했습니다. Error : '.$conn->error);
?>
    <table>
        <tr>
            <td>NO</td>
            <td>물품</td>
            <td>가격</td>
            <td>상품</td>
        </tr>
<?php
    while($row = $result->fetch_array(MYSQLI_NUM)) {
?>
    <tr>
        <td><?=$row[0]?></td>
        <td><a href="addcart.php?selllist=<?=$row[1]?>&price=<?=$row[2]?>"><?=$row[1]?></a></td>
        <td><?=$row[2]?></td>
        <td><img src="img/<?=$row[3]?> "style="width: 100px; height: 100px"></td>
    </tr>
    <?php } ?>
    </table>
</body>
</html>