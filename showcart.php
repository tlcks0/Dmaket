<!DOCTYPE html>
<html>
<head>
    <title>Dmaket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="D.jpg" type="image/x-icon" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            text-align: center;
        }
        #Dmaket {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 70%;
            margin-left: auto;
            margin-right: auto;
        }
        #Dmaket td, #Dmaket th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        #Dmaket tr:nth-child(even){background-color: #f2f2f2;}
        #Dmaket tr:hover {background-color: #ddd;}
        #Dmaket th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #333333;
            color: #fff;
        }
        #Dmaket img {
            width: 120px;
            height: 80px;
        }
        .btn {
            background-color: #333333;
            color: #fff;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 70%;
            opacity: 0.9;
            margin-top: 10px;
        }
        .btn:hover {
            opacity: 1;
            color: #fff;
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
    <h1>????????????</h1> 
<?php
#cart ?????????????????? ????????? ???????????? ???????????? ????????????
#1. ?????????????????? ????????? ????????????
session_start();
$userid = $_SESSION['userid'];
#2. DB ??????
include_once('dbconn.php');
#3. SELECT SQL ??????
$sql= "select cart.*, photo from cart, selllist where userid ='$userid' 
        and cart.sellname = selllist.name";
#4. SQL ??????
$result = $conn->query($sql);
#5. ??????????????? ????????? ??????
if(!$result) 
    die('????????? ????????? ??????????????????. Error : '.$conn->error);
if($result->num_rows > 0) {
    $no = 1;
?>
<form action="removecart.php" method="post">
    <table id="Dmaket">
        <tr>
            <th></th><th>NO</th><th></th><th>??????</th><th>??????</th><th>??????</th>
        <tr>
    <?php
    while($row = $result->fetch_assoc()) {
    ?>
    <tr>
        <td><input type="checkbox" name="chk[]" value="<?=$row['sellname']?>"></td>
        <td><?=$no++?></td>
        <td><img src="img/<?=$row['photo']?>"></td>
        <td><?=$row['sellname']?></td>
        <td><?=$row['qty']?></td>
        <td><?=$row['price']?></td>
    </tr>
    <?php } ?>
    </table>
    <button type="submit" class="btn">??????????????????</button>    
</form>
    <button class="btn" onclick="location.href='ordernew.php'">????????????</button>
<?php } ?>
</body>
</html>