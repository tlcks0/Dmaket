<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dmaket</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="D.jpg" type="image/x-icon" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    @import url(http://fonts.googleapis.com/earlyaccess/notosanskr.css);
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css");
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

    #home, #best, #shopping {
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

    /* 드롭다운 */
    .dropdown {
    display: inline-block;
    }
    .dropbtn {
    background-color: transparent;
    color: #9D9D9D;
    margin-right: 25px;
    padding: 15px;
    font-size: 14px;
    border: none;
    cursor: pointer;
    }

    .dropdown-content {
    display: none;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    }

    .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    }

    .dropdown-content a:hover {background-color: #f1f1f1}

    .dropdown:hover .dropdown-content {
    display: block;
    }
</style>
</head>
<body>

<?php
	$logged = false;
	if(isset($_SESSION['userid'])) {  // 세션에 uid 키가 정의되어 있으면 
		$userid = $_SESSION['userid'];
		$name = $_SESSION['name'];
		$logged = true;
	}
	
	#1. Database connection
	include_once('dbconn.php');
	// 장바구니 검색
	if($logged) {
	$sql = "select count(*) rowcnt from cart where userid = '$userid'";
	$result = $conn->query($sql);
	//$row = $result->fetch_array(MYSQLI_NUM);
	$row = $result->fetch_assoc();
	}
?>
<?php
    session_start();
    $logged = false;
    if(isset($_SESSION['userid'])) {  // 세션에 uid 키가 정의되어 있으면 
        $userid = $_SESSION['userid'];
        $name = $_SESSION['name'];
        $logged = true;
    }
    #1. Database connection
    include_once('dbconn.php');
    // 장바구니 검색
    if($logged) {
    $sql = "select count(*) rowcnt from cart where userid = '$userid'";
    $result = $conn->query($sql);
    //$row = $result->fetch_array(MYSQLI_NUM);
    $row = $result->fetch_assoc();
    }
?>
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
                <li><a href="#" onclick="scrollToSection('#')"><i class="bi bi-house-door"></i>HOME</a></li>
                <li><a href="#best" onclick="scrollToSection('#best')"><i class="bi bi-award"></i>BEST</a></li>
                <li><a href="#shopping" onclick="scrollToSection('#shopping')"><i class="bi bi-cart4"></i>SHOPPING</a></li>
                <li><a href="#post" onclick="scrollToSection('#post')"><i class="bi bi-postcard"></i>POST</a></li>
            </ul>
			<?php
				if(!$logged) {
					echo "<ul class='nav navbar-nav navbar-right'><li><a href='signin.html'><span class='glyphicon glyphicon-log-in'></span>&nbsp;&nbsp;로그인</a></ul>";
				}
				else {
                    echo "<ul class='nav navbar-nav navbar-right'><li><a href=''>{$name}님 환영합니다.</a></li>
                            <li><a href='signout.php'>로그아웃</a></li>
                            <li><a href='writeboard.php'>고객센터</a></li>";

                    echo "<div class='nav navbar-nav navbar-right dropdown'>
                            <button class='dropbtn'>내 정보</button>
                            <div class='dropdown-content'>
                            <a href='showcart.php'>장바구니(".$row['rowcnt'].")</a>
                            <a href='showorder.php'>주문내역</a>
                            <a href='signmodify.php'>회원정보수정</a>
                            <a href='signdel.php'>회원탈퇴</a>
                        </div></ul>";
				}
			?>
            
			
        </div>
    </div>
</nav>

<!-- slideshow -->
<div class="carousel slide" data-ride="carousel" id="slideshow">
    <ol class="carousel-indicators">
        <li class="active" data-target="#slideshow" data-slide-to="0"></li>
        <li data-target="#slideshow" data-slide-to="1"></li>
        <li data-target="#slideshow" data-slide-to="2"></li>
        <li data-target="#slideshow" data-slide-to="3"></li>
    </ol>
    <!-- slide -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="images2/1.jpg">
            <div class="carousel-caption">
                <h3>헤라 선크림</h3>
                <p>다가오는 계절 텐션 맞춰 줄</p>
            </div>
        </div>
        <div class="item">
            <img src="images2/2.jpg">
            <div class="carousel-caption">
                <h3>메타그린 슬림업</h3>
                <p>10년간 100만 다이어터들이 인정한</p>
            </div>
        </div>
        <div class="item">
            <img src="images2/3.jpg">
            <div class="carousel-caption">
                <h3>롯데칠성 제로탄산 BIG3</h3>
                <p>칼로리 걱정없이 즐기는 탄산음료</p>
            </div>
        </div>
        <div class="item">
            <img src="images2/4.jpg">
            <div class="carousel-caption">
                <h3>네이처스웨이</h3>
                <p>세계적인 트렌드 맛있는 구미영양제</p>
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

<!-- 핫딜 -->
<div class="container text-center" id="best">
    <h1>롯데칠성 제로탄산 BIG3</h1>
    <h4>칼로리 걱정없이 즐기는 탄산음료</h4>
    <p>음료</p>
    <br>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>국민 음료의 ORIGINALITY</strong></p>
            <a href="#one" data-toggle="collapse">
                <img src="images2/칠성사이다.jpg">
            </a>
            <div id="one" class="collapse">
                <a href=""><p>칠성사이다 제로</p></a>
            </div>
        </div>
        <div class="col-sm-4">
            <p><strong>요즘 대세 트렌드 아이템은 나야나</strong></p>
            <a href="#two"  data-toggle="collapse">
                <img src="images2/펩시콜라.jpg">
            </a>
            <div id="two" class="collapse">
                <a href=""><p>펩시콜라 제로</p></a>
            </div>
        </div>
        <div class="col-sm-4">
            <p><strong>과일향 탄산제로</strong></p>
            <a href="#third"  data-toggle="collapse">
                <img src="images2/탐스제로.jpg">
            </a>
            <div id="third" class="collapse">
                <a href=""><p>탐스제로</p></a>
            </div>
        </div>
    </div>
</div>

<div class="bg-1">
  <div class="container">
      <h3 class="text-center">쇼핑핫딜</h3>
      <p class="text-center">베스트 판매량</p>
      <ul class="list-group">
          <li class="list-group-item">UV프로텍터 멀티디펜스
            <span class="label label-danger" style="margin-left: 10px">34,000원</span>
          </li>
          <li class="list-group-item">메타그린 슬림업 65일분 + 체험분 15일 증정추가
            <span class="label label-info" style="margin-left: 10px">61,200원</span>
          </li>
          <li class="list-group-item">칠성사이다 제로 355ml x 24캔
            <span class="label label-success" style="margin-left: 10px">22,900원</span>
          </li>
          <li class="list-group-item">네이처스웨이 비타구미 비타민 D 1000IU 140구미 +증정
            <span class="label label-warning" style="margin-left: 10px">34,900원</span>
          </li>
      </ul>
      <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#dialog">자세히
      </button>
      
<!-- Modal -->
    <div id="dialog" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4>물품</h4>
        </div>
        <div class="modal-body">
            <p>UV프로텍터 멀티디펜스</p></a>
            <p>메타그린 슬림업 65일분 + 체험분 15일 증정추가</p></a>
            <p>칠성사이다 제로 355ml x 24캔</p></a>
            <p>네이처스웨이 비타구미 비타민 D 1000IU 140구미 +증정</p></a>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">닫기</button>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
<!-- shopping -->
<div class="container-fluid bg-3 text-center" id="shopping">    
    <h3>SHOPPING</h3>
    <!--<div class="row">
        <div class="col-sm-4">
            <img src="images2/shopping1.jpg" class="img-responsive" style="width: 100%">
        </div>
        <div class="col-sm-4">
            <img src="images2/shopping2.jpg" class="img-responsive" style="width: 100%">
        </div>
        <div class="col-sm-4">
            <img src="images2/shopping3.jpg" class="img-responsive" style="width: 100%">
        </div>
        <div class="col-sm-4">
            <img src="images2/shopping4.jpg" class="img-responsive" style="width: 100%">
        </div>
        <div class="col-sm-4">
            <img src="images2/shopping5.jpg" class="img-responsive" style="width: 100%">
        </div>
        <div class="col-sm-4">
            <img src="images2/shopping6.jpg" class="img-responsive" style="width: 100%">
        </div>
    </div> -->
    <?php	
	#2. SELECT SQL문 : selllist 테이블의 전체 레코드 검색하는 구문
	$sql = "select * from selllist";
	#3. SQL 실행하기
	$result = $conn->query($sql); 
	#4. 실행결과 레코드들을 화면에 보이기
	if(!$result)
		die('물품 데이터 검색에 오류가 발생했습니다. Error : '.$conn->error);
	?>
	<?php
	while($row = $result->fetch_array(MYSQLI_NUM)) {
	?>
    <div class="row">
	<div class="col-sm-4" style="width: 100%">
		<a href="addcart.php?selllist=<?=$row[1]?>&price=<?=$row[2]?>">
			<img src="images2/<?=$row[3]?>"></a>
		<div class="">
			<h3><?=$row[1]?></h3>
			<h3><?=$row[2]?></h3>
		</div>
	</div>
	<?php } //<?php} 안됨 ?>
		
</div>

<!-- post -->
<div class="container-fluid bg-3 text-center" id="post"> 
<h3 class="text-center">SHOPPING COMMUNITY</h3> 
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#menu0">리뷰</a></li>
</ul>

<div class="tab-content">
  <div id="menu0" class="tab-pane fade in active">
      <h4><small>RECENT POSTS</small></h4>
      <hr>
      <h2>칠성사이다 제로 다이어트하면서 마셔본 후기</h2>
      <h5><span class="glyphicon glyphicon-time"></span> 칠성, 2022.2.16.</h5>
      <h5><span class="label label-danger">제로탄산</span> <span class="label label-primary">칠성사이다</span></h5><br>
      <div class="panel panel-default">
        <div class="panel-body">
            <p><img src="images2/view1.JPG"></p>
            <p>모두들 탄산음료 좋아하시죠??<br>요즘 다이어트 하시는분들 많을탠데요~ 저도 그중 한명이랍니다.. 탄산음료가 칼로리가 엄청 높다고 하자나요?? 
            근데 또 탄산음료 없이는 못사는 사람인지라.. 저칼로리 음료를 찾다보니 이게 모람?! 전부터 많이 먹던 칠성사이다에서 제로탄산 음료가 있더라구요??
            </p>
            <p><img src="images2/view2.JPG"></p>
            <p>바로 구매해버렸지 뭐에요~ <br>제가 산건 24캔짜리에요 생각보다 저렴하더라구요</p>
            <p><img src="images2/view3.JPG"></p>
            <p>0칼로리라서 대박 대박!! <br>아무래도 다이어터들은 열량을 많이 신경쓰잖아요. 근데 요건 1도 신경을 안써도 되겠어요!!</p>
            <p><img src="images2/view4.JPG"></p>
            <p>제로라고 해서 탄산이 덜 있거나 하지 않고 충분해요!<br>따를 때부터 쏴아아~~ 맥주처럼 거품이 넘치진 않지만 소화 안될 때 속이 제대로 뚫립니다.
            <br>다이어터들~ 칼로리 높은 일반 음료수 대신 당은 줄이면서 시원하게 마시고 싶다면,<br> 칼로리가 걱정된다면 주저하지말고 드세요!!</p>
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

<!--footer-->
<footer class="text-center border-top border-secondary" style="margin-top:100px">
	대진대학교 휴먼IT공과대학 컴퓨터공학전공
	<p style="font-size:5px;">경기도 포천시 호국로 1007(선단동) &copy; 20192316 김시찬</p>
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
// 화면을 부드럽게 스크롤링하기
function scrollToSection(loc) {
    var offset = $(loc).offset();
    $('html, body').animate({scrollTop: offset.top}, 500);
}
</script>

</body>
</html>
