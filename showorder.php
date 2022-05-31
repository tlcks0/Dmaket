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
$sql= "select * from porder where userid = '$userid' order by orddate desc";
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
            <th>주문번호</th><th>주문일자</th><th>우편번호</th><th>도로명주소</th><th>상세주소</th><th>참고항목</th><th>주문금액</th><th>배달료</th><th>결제금액</th>
        <tr>
    <?php
    while($row = $result->fetch_assoc()) {
    ?>
    <tr>
        <td><a href="showorderdet.php?ordno=<?=$row['ordno']?>"><?=$row['ordno']?></a></td>
        <td><?=$row['orddate']?></td>    
        <td><?=$row['ADDRESS_ZIPCODE']?></td>
        <td><?=$row['ADDRESS_ROAD']?></td>
        <td><?=$row['ADDRESS_DETAIL']?></td>
        <td><?=$row['ADDRESS_SUBDETAIL']?></td>
        <td><?=$row['omunt']?></td>
        <td><?=$row['delant']?></td>
        <td><?=$row['total']?></td>
    </tr>
    <?php } ?>
    </table>
<?php } ?>
</body>
</html>