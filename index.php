<!DOCTYPE html>
<html lang="en">
<head>
  <title>유럽 즐기기</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="D.jpg" type="image/x-icon" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    @import url(http://fonts.googleapis.com/earlyaccess/notosanskr.css);
    body {
      font-family: 'Noto Sans KR', sans-serif;
    }
    .container {
        padding: 80px 120px;
    }
    .dev {
    border: 10px solid transparent;
    margin-bottom: 25px;
    width: 100%;
    height: 100%;
    }
    .dev:hover {
    border-color: #f1f1f1;
    }
      
    .carousel-inner img {
        /*filter: grayscale(90%);  make all photos black and white */ 
        width: 100%; /* Set width to 100% */
        margin: auto;
    }

    .carousel-caption h3 {
        color: #fff !important;
    }

    @media (max-width: 600px) {
        .carousel-caption {
            display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
        }
    }

    .bg-1 {
        background: #2d2d30;
        color: #bdbdbd;
    }
    .bg-1 h3 {color: #fff;}
    .bg-1 p {font-style: italic;}
    .nav-tabs li a {
        color: #777;
    }

    #home, #about, #gallery {
      margin-top: 60px;
    }
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }


	/* 추가한것 */
	/* Style the links inside the navigation bar */

</style>
</head>
<body>

<?php
	session_start();
	$logged = false;
	if(isset($_SESSION['userid'])) {  // 세션에 uid 키가 정의되어 있으면 
		$uid = $_SESSION['userid'];
		$uname = $_SESSION['name'];
		//echo "$uid : $uname<br>";
		$logged = true;
	}
	#1. Database connection
	include_once('dbconn.php');
	// 장바구니 검색
	if($logged) {
	$sql = "select count(*) rowcnt from cart where email = '$uid'";
	$result = $conn->query($sql);
	//$row = $result->fetch_array(MYSQLI_NUM);
	$row = $result->fetch_assoc();
	}
?>
<div class="topnav">
<?php
	if(!$logged) {
		echo "<a href='signup.html'>회원가입</a>";
		echo "<a href='signin.html'>로그인</a>";
	}
	else {
		echo "<a href=''>{$name}님 환영합니다.</a>";
		echo "<a href='signout.php'>로그아웃</a>";
		echo "<a href='signmodify.php'>회원정보수정</a>";
		echo "<a href='signdel.php'>회원탈퇴</a>";
		echo "<a href='showcart.php'>장바구니(".$row['rowcnt'].")</a>";
		echo "<a href='showorder.php'>주문내역</a>";
		echo "<a href='writeboard.php'>글작성</a>";
	}
?>
</div>

<!-- navbar -->
<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">I love Europe</a>
        </div>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="nav navbar-nav">
                <li><a href="#">HOME</a></li>
                <li><a href="#about">ABOUT</a></li>
                <li><a href="#gallery">GALLERY</a></li>
                <li><a href="#post">POST</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="signin.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- slideshow -->
<div class="carousel slide" data-ride="carousel" id="slideshow">
    <ol class="carousel-indicators">
        <li class="active" data-target="#slideshow" data-slide-to="0"></li>
        <li data-target="#slideshow" data-slide-to="1"></li>
        <li data-target="#slideshow" data-slide-to="2"></li>
    </ol>
    <!-- slide -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="images/bg1.jpg">
            <div class="carousel-caption">
                <h3>스페인 마드리드</h3>
                <p>석양에 물든 마드리드 시가지</p>
            </div>
        </div>
        <div class="item">
            <img src="images/bg2.jpg">
            <div class="carousel-caption">
                <h3>스페인 마드리드</h3>
                <p>석양에 물든 마드리드 시가지</p>
            </div>
        </div>
        <div class="item">
            <img src="images/bg3.jpg">
            <div class="carousel-caption">
                <h3>스페인 마드리드</h3>
                <p>석양에 물든 마드리드 시가지</p>
            </div>
        </div>
    </div>
    <!-- left and right controls -->
    <a class="left carousel-control" href="#slideshow" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#slideshow" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- Main Content -->
<div class="container text-center" id="about">
    <h1>세상의 모든 여행</h1>
    <h4>We are Travellers!</h4>
    <p>추천여행</p>
    <br>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>유럽에서 빵만 먹다니..</strong></p>
            <a href="#one" data-toggle="collapse">
                <img src="images/second1.png">
            </a>
            <div id="one" class="collapse">
                <a href=""><p>유럽의 음식여행</p></a>
            </div>
        </div>
        <div class="col-sm-4">
            <p><strong>나 홀로 떠나는 런던여행</strong></p>
            <a href="#two"  data-toggle="collapse">
                <img src="images/second2.png">
            </a>
            <div id="two" class="collapse">
                <a href=""><p>런던 5박6일 여행</p></a>
            </div>
        </div>
        <div class="col-sm-4">
            <p><strong>죽기전에 가봐야 할 명소</strong></p>
            <a href="#third"  data-toggle="collapse">
                <img src="images/second3.png">
            </a>
            <div id="third" class="collapse">
                <a href=""><p>떠나자..</p></a>
            </div>
        </div>
    </div>
</div>

<div class="bg-1">
  <div class="container">
      <h3 class="text-center">여행핫딜</h3>
      <p class="text-center">오늘의 베스트 상품</p>
      <ul class="list-group">
          <li class="list-group-item">해리포터 스튜디오 입장권
            <span class="label label-danger" style="margin-left: 10px">65,800원</span>
          </li>
          <li class="list-group-item">오페라의 유령
            <span class="label label-info" style="margin-left: 10px">65,800원</span>
          </li>
          <li class="list-group-item">런던 세인트폴 대성당
            <span class="label label-success" style="margin-left: 10px">65,800원</span>
          </li>
          <li class="list-group-item">런던 올데이 투어
            <span class="label label-warning" style="margin-left: 10px">65,800원</span>
          </li>
      </ul>
      <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#dialog">여행꿀팁
      </button>
      
<!-- Modal -->
    <div id="dialog" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4>여행꿀팁</h4>
        </div>
        <div class="modal-body">
            <a href="https://www.wishbeen.co.kr/plan/d0093238de9bcb77"><p>영국음식 생각보다 나쁘지 않아요</p></a>
            <a href="https://www.wishbeen.co.kr/plan/5baa00938f44a8a5"><p>지구촌 세계 연말 대축제</p></a>
            <p>다른 나라에서는 크리스마스에 뭘 먹나?</p>
            <p>유럽에서 놓치지 말아야 할 야경 BEST7</p>
            <p>런던 여행 입문자용</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
<!-- Gallery -->
<div class="container-fluid bg-3 text-center" id="gallery">    
    <h3>Gallery</h3>
    <div class="row">
        <div class="col-sm-3">
            <p><button type="button" class="btn btn-sm btn-danger">히드로공항</button></p>
            <img src="images/gallery1.png" class="img-responsive" style="width: 100%">
        </div>
        <div class="col-sm-3">
            <p><button type="button">히드로공항</button></p>
            <img src="images/gallery2.jpg" class="img-responsive" style="width: 100%">
        </div>
        <div class="col-sm-3">
            <p><button type="button">히드로공항</button></p>
            <img src="images/gallery3.jpg" class="img-responsive" style="width: 100%">
        </div>
        <div class="col-sm-3">
            <p><button type="button">히드로공항</button></p>
            <img src="images/gallery4.jpg" class="img-responsive" style="width: 100%">
        </div>
    </div>
</div>

<!-- post -->
<div class="container-fluid bg-3 text-center" id="post"> 
<h3 class="text-center">TRAVEL COMMUNITY</h3> 
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#menu0">여행기</a></li>
  <li><a data-toggle="tab" href="#menu1">정보</a></li>
  <li><a data-toggle="tab" href="#menu2">잡담</a></li>
</ul>

<div class="tab-content">
  <div id="menu0" class="tab-pane fade in active">
      <h4><small>RECENT POSTS</small></h4>
      <hr>
      <h2>동심의 세계로</h2>
      <h5><span class="glyphicon glyphicon-time"></span> Post by Jmkim, May 27, 2017.</h5>
      <h5><span class="label label-danger">아티클</span> <span class="label label-primary">엠엔엠박물관ㅔ냇</span></h5><br>
      <div class="panel panel-default">
        <div class="panel-body">
            <p>잠깐 보고 나와야지, 했는데 매장에서 2시간...
            단순한 매장이 아니라 거의 엠엔엠 박물관이라고 해도 손색이 없다!! 초콜렛을 그람수대로 담아서 계산할수도 있고, 장난감, 자석, 목걸이, 열쇠고리 등 가격별 기념품이 많아서 충동구매하기 쉽다.</p>
            <p><img src="images/post1.JPG"></p>
            <p><img src="images/post2.JPG"></p>
        </div>
      </div>
      <br><br>
  </div>
  <div id="menu1" class="tab-pane fade">
    <h2>Chandler Bing, Guitarist</h2>
    <p>Always a pleasure people! Hope you enjoyed it as much as I did. Could I BE.. any more pleased?</p>
  </div>
  <div id="menu2" class="tab-pane fade">
    <h2>Peter Griffin, Bass player</h2>
    <p>I mean, sometimes I enjoy the show, but other times I enjoy other things.</p>
  </div>
</div>
</div>

<footer class="text-center border-top border-secondary" style="margin-top:100px">
	대진대학교 휴먼IT공과대학 컴퓨터공학전공
	<p style="font-size:5px;">경기도 포천시 호국로 1007(선단동)</p>
</footer>

<script>
$(document).ready(function(){
  // Add scrollspy to <body>
  $('body').scrollspy({target: ".navbar", offset: 50});   

  // Add smooth scrolling on all links inside the navbar
  $("#myNavbar a").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    }  // End if
  });
});
</script>

</body>
</html>
