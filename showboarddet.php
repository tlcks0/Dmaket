<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Dmaket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    * {
      box-sizing: border-box;
    }

    body {
      width: 600px;
      margin-left: auto;
      margin-right: auto;
    }

    input[type=text], select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }

    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
    }

    input[type=submit], button {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 10px;
      margin-left: 10px;
      float: right;
    }

    input[type=submit]:hover, button:hover {
      background-color: #45a049;
    }

    .container {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }

    .col-25 {
      float: left;
      width: 25%;
      margin-top: 6px;
    }

    .col-75 {
      float: left;
      width: 75%;
      margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    h2 {
      margin-top: 70px;
    }
    </style>
    </head>
  <body>
    <?php
    if(!isset($_GET['no'])) {
      header("location: showboard.php");
    }
    include_once('dbconn.php');
    $no = $_GET['no'];  // 선택한 게시글 번호
    $sql = "select * from board where no = $no";
    $result = $conn->query($sql);
    if(!$result) {  // 검색오류가 있을 때
      echo $conn->error;
      die("게시판 글 검색에 오류가 있습니다.");
    }
    $row = $result->fetch_assoc();  // 한 건의 레코드 가져옴
    $userid = $row['userid'];
    $wdate = $row['wdate'];
    $title = $row['title'];
    $note = $row['content'];
    $att = $row['attachment'];
    ?>
    <h2>문의내역 확인</h2>
    <p>선택한 문의내역을 확인합니다.</p>
    <hr>
    <div class="container">
      <form action="modboard.php" method="post">
          <input type="text" name="no" value="<?=$no?>" hidden>
        <div class="row">
          <div class="col-25">
            <label for="fname">작성자</label>
          </div>
          <div class="col-75">
            <input type="text" name="userid" value="<?=$userid?>" readonly>
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="lname">작성일</label>
          </div>
          <div class="col-75">
            <input type="text" name="wdate" value="<?=$wdate?>" readonly>
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="lname">제목</label>
          </div>
          <div class="col-75">
            <input type="text" name="title" value="<?=$title?>" readonly>
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="lname">내용</label>
          </div>
          <div class="col-75">
            <textarea rows="10" name="note" readonly><?=$note?></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="lname">첨부파일</label>
          </div>
          <div class="col-75">
            <a href="filedownload.php?file=<?=$att?>"><?=$att?></a>
          </div>
        </div>
        <div class="row">
          <button type="button" onclick="location.href='showboard.php'" style="background: #007bff">리스트</button>
          <?php
          if($userid == $_SESSION['userid']) { // 작성자 = 로그인 사용자
          ?>
          <input type="submit" value="수정" style="background: #007bff">
          <button type="button" onclick="location.href='removeboard.php?no=<?=$no?>'" style="background: #007bff">삭제</button>
          <?php } ?>
        </div>
      </form>
    </div>
  </body>
</html>

















