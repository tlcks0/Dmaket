<!DOCTYPE html>
<html>
<head>
    <title>주문내역</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="D.jpg" type="image/x-icon" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
            background-color: #333333;
            color: #fff;
        }
        #dmaket img {
            width: 120px;
            height: 80px;
        }
        .btn {
            background-color: #333333;
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
        h1 {
            margin-top: 70px;
            color: #000;
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-fixed-top navbar-inverse">
          <div class="container-fluid">
              <div class="navbar-header">
                  <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#menu">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand">Dmaket</a>
              </div>
              <div class="collapse navbar-collapse" id="menu">
                  <ul class="nav navbar-nav">
                      <li><a href="index.php">HOME</a></li>
                  </ul>
              </div>
          </div>
      </nav>    
    <h1>주문내역</h1>     
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