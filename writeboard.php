<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Dmaket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="board.css">

    </head>

    <body>
        <?php
        if(isset($_SESSION['userid'])) {
            $userid = $_SESSION['userid'];
			$name = $_SESSION['name'];
		}
        else // 로그인상태가 아니면
            header("location: signin.html"); // 로그인페이지로 이동하기
        $wdate = date('Y/m/d');
        ?>
        <div class="tab">
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
            <div class="row">
              <input type="submit" value="작성">
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
















