<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Dmaket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="board.css">
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
                color: #9d9d9d;
            }
        #dmaket img {
            width: 120px;
            height: 80px;
        }
        .btn {
            background-color: orange;
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
        /* Style Page */
        .paging_area { 
            width: 100%;
            height: 50px;
            padding-top: 7px;
            margin-left: auto;
        }
        .paging_area a, .paging_area span {
            /*
            color: black;
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;*/
            display: inline-block;
            border-radius: 3px;
            border: solid 1px #c0c0c0;
            background: #e9e9e9;
            box-shadow: inset 0px 1px 0px rgba(255,255,255, .8), 0px 1px 3px rgba(0,0,0, .1);
            padding: 3px 9px;
            font-weight: bold;
            text-decoration: none;
            color: #717171;
            text-shadow: 0px 1px 0px rgba(255,255,255, 1);
        }
        .paging_area a.active {
            background-color: dodgerblue;
            color: white;
        }
        .paging_area a:hover:not(.active) {background-color: #fefefe;}
        /* Search */
        .topnav .search-container {
            float: right;
        }
        .topnav input[type=text] {
            padding: 6px;
            margin-top: 8px;
            font-size: 17px;
            border: 3px solid #ddd;
            margin-right: 6px; 
            margin-bottom: 10px;
        }
        .topnav .search-container button {
            float: right;
            padding: 6px 10px;
            margin-top: 8px;
            margin-right: 16px;
            background: #ddd;
            font-size: 17px;
            border: none;
            cursor: pointer;
        }
        .topnav .search-container button:hover {
            background: #ccc;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            margin-top: 5px;
            margin-left: 5px;
        }
        button:hover {
            background-color: #007bdd;
        }
        h2 {
        margin-top: 70px;
        }   
    </style>
</head>
<body>
    <h2>고객센터 문의목록</h2>
    <p>고객센터 문의목록을 확인합니다.</p>
    <div class="divider"></div>
    <form action="<?= $_SERVER['PHP_SELF']?>" method="get">
        <input type="text" name="keyword" placeholder="검색 키워드 입력...">
        <button type="submit">검색</button>
    </form>
    <?php
		include_once('dbconn.php');
        // 검색 키워드 읽어와서 조건으로 검색하기.
        if(isset($_GET['keyword']) && strpos($_GET['keyword'], '%') === false) {
            $keyword = $_GET['keyword'];
            $keyword = '%'.$keyword.'%';    // 제목이 keyword 값이 들어있는 것 검색
        }
        else if(isset($_GET['keyword'])) $keyword = '%';
        else $keyword = $_GET['keyword'];

        // 페이징을 위한 변수선언과 값 설정
        $list_size = 6; // 1 페이지의 레코드 개수
        $more_page = 3; // 현재 페이지 이전과 이후에 나올 페이지 수
        $page = 0; // 현재 페이지 번호
        $page = (isset($_GET['page']))? intval($_GET['page']) : 1;
        $sql = "select count(*) cnt from board";  
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $rowcnt = $row['cnt'];  // 게시판에 있는 전체 레코드 개수
        $page_count = (int)($rowcnt / $list_size); // 페이지 개수
        if($rowcnt % $list_size > 0) $page_count++;
        // 현재 페이지 이전에 나올 페이지들의 시작번호
        $start_page = max($page - $more_page, 1); 
        $end_page = min($page + $more_page, $page_count);
        $offset = ($page - 1) * $list_size; // 건너갈 레코드 개수
          
		$sql = "select board.* from board where title like '$keyword' order by no desc limit $offset, $list_size";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
    ?>
		<hr>
        <table id='dmaket'>
        <tr>
            <th>번호</th>
            <th>작성자</th>
            <th>작성일자</th>
            <th>제목</th>
        </tr>
        <?php
            while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><a href="showboarddet.php?no=<?=$row['no']?>"><?=$row['no']?></a></td>
            <td><?=$row['userid']?></td>
            <td><?=$row['wdate']?></td>
            <td><?=$row['title']?></td>
        </tr>
        <?php } ?>
        </table>
        <div class="paging_area">
            <?php
            // 현재 페이지 이전으로 가도록 PREV 링크 생성
            if($page > 1) {
            ?>
            <a href="showboard.php?page=<?=($page - 1)?>&keyword=<?=$keyword?>">이전</a>
            <?php } else { ?>
            <span>이전</span>
            <?php } ?>
            <?php
            // 현재 페이지를 중심으로 이전 이후에 페이지번호 나열하기
            for($p=$start_page; $p<=$end_page; $p++) {
                if($p == $page)
                    echo "<a class='active' href='#'>$p</a>";
                else {
            ?>
            <a href="showboard.php?page=<?=$p?>&keyword=<?=$keyword?>"><?=$p?></a>
            <?php }} ?>
            <?php
            // 현재 페이지 다음에 NEXT를 표시하기
            if($page < $end_page) { ?>
            <a href="showboard.php?page=<?=($page + 1)?>&keyword=<?=$keyword?>">다음</a>
            <?php } else { ?>
            <span>다음</span>
            <?php } ?>
        </div>

    
        <?php
        }
        else {
            echo "등록된 게시글이 없습니다.";
        }
        ?>

</body>
</html>








