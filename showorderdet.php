<!DOCTYPE html>
<html>
<head>
    <title>배송주문서 리스트</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
                text-align: center;
            }
            #dmaket {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 70%;
                margin-left: auto;
                margin-right: auto;
            }
            #dmaket td, #dmaket th {
                border: 1px solid #ddd;
                padding: 8px;
            }
            #dmaket tr:nth-child(even){background-color: #f2f2f2;}
            #dmaket tr:hover {background-color: #ddd;}
            #dmaket th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: center;
                background-color: #4CAF50;
                color: white;
            }
        #dmaket img {
            width: 120px;
            height: 80px;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 70%;
            opacity: 0.9;
            margin-top: 10px;
        }
        .btn:hover {
            opacity: 1;
        }
    </style>
</head>
<body>
    <h1>배송주문서 리스트</h1>     
<?php
#cart 테이블로부터 레코드 검색해서 나열하는 프로그램
#1. 세션시작하고 이메일 가져오기
session_start();
$userid = $_SESSION['userid'];
#2. DB 연결
include_once('dbconn.php');
#3. SELECT SQL 작성
$ordno = $_GET['ordno'];
$sql= "select * from orditem where ordno = '$ordno'";
#4. SQL 실행
$result = $conn->query($sql);
#5. 레코드들을 하나씩 나열
if(!$result) 
    die('검색에 오류가 발생했습니다. Error : '.$conn->error);
if($result->num_rows > 0) {
    $no = 1;
?>
    <table id="dmaket">
        <tr>
            <th>주문번호</th><th>NO</th><th>물품</th><th>수량</th><th>주문금액</th>
        <tr>
    <?php
    while($row = $result->fetch_assoc()) {
    ?>
    <tr>
        <td><?=$row['ordno']?></td>
        <td><?=$row['seq']?></td>    
        <td><?=$row['sellname']?></td>
        <td><?=$row['qty']?></td>
        <td><?=$row['price']?></td>
    </tr>
    <?php } ?>
    </table>
<?php } ?>
</body>
</html>