<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Dmaket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="D.jpg" type="image/x-icon" />
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
        include_once('dbconn.php');
        $no = $_POST['no'];  // 선택한 게시글 번호
        $userid = $_POST['userid'];
        $wdate = $_POST['wdate'];
        $title = $_POST['title'];
        $note = $_POST['note'];

        ?>
        <h2>문의내역 수정</h2>
        <p>선택한 문의내역을 수정합니다.</p>
        <hr>
        <div class="container">
          <form action="modboardproc.php" method="post">
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
                <input type="text" name="title" value="<?=$title?>" >
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">내용</label>
              </div>
              <div class="col-75">
                <textarea rows="10" name="note" ><?=$note?></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">첨부파일</label>
              </div>
              <div class="col-75">
                <input type="file" name="att">
              </div>
            </div>
            
            <div class="row">
              <button type="button" onclick="location.href='showboard.php'" style="background: #007bff">목록</button>
              <?php
                if($userid == $_SESSION['userid']) {  // 작성자 = 로그인 사용자
              ?>
              <button type="submit" style="background: #007bff">수정</button>
              <button type="button" onclick="location.href='removeboard.php?no=<?=$no?>'" style="background: #007bff">삭제</button>
              <?php } ?> 
            </div>
          </form>
        </div>
    </body>
</html>

















