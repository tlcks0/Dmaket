<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Dmaket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/board.css">
    <link rel="shortcut icon" href="D.jpg" type="image/x-icon" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <style>
      #tab, #newboard {
        margin-top: 50px;
      }
    </style>
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
        <?php
        if(isset($_SESSION['userid'])) {
          $userid = $_SESSION['userid'];
          $name = $_SESSION['name'];
		    }
        else // 로그인상태가 아니면
          header("location: signin.html"); // 로그인페이지로 이동하기
        $wdate = date('Y/m/d');
        ?>
        <div class="tab" id="tab">
          <button class="tablinks" onclick="openTab(event, 'newboard')" id="defaultOpen">문의작성</button>
          <button class="tablinks" onclick="openTab(event, 'showboard')">문의목록</button>
        </div>
        
        <div id="newboard" class="tabcontent">
        <h2>문의작성</h2>
        <p>고객센터에 문의내용을 게시합니다.</p>
        <div class="divider"></div>
        <div class="container">
          <form action="writeboardproc.php" method="post" enctype="multipart/form-data">
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
                <input type="text" name="title" placeholder="제목..">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">내용</label>
              </div>
              <div class="col-75">
                <textarea rows="10" name="note"></textarea>
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
            <div class="row" id="btn">
              <input type="submit" value="작성" style="background: #007bff">
            </div>
          </form>
        </div>
        </div>
        
        <div id="showboard" class="tabcontent">
            <iframe src="showboard.php" style="width:100%; height:100%; border:none"></iframe>
        </div>
        <script>
            function openTab(evt, tabName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
            }
            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        </script>
    </body>
</html>
















