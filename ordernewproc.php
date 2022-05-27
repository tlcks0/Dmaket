<?php
include_once('dbconn.php');
#1.porder 테이블에 레코드 추가.
$ordno = $_POST['ordno'];
$userid = $_POST['userid'];
$orddate = date('Y/m/d');
$ADDRESS_ZIPCODE = $_POST['ADDRESS_ZIPCODE'];
$ADDRESS_ROAD = $_POST['ADDRESS_ROAD'];
$ADDRESS_DETAIL = $_POST['ADDRESS_DETAIL'];
$ADDRESS_SUBDETAIL = $_POST['ADDRESS_SUBDETAIL'];
$amount = $_POST['amount'];
$delamt = $_POST['delamt'];
$total = $amount + $delamt ;

$sql = "insert into porder values('$ordno', '$userid', '$orddate', '$ADDRESS_ZIPCODE',
'$ADDRESS_ROAD', '$ADDRESS_DETAIL', '$ADDRESS_SUBDETAIL', $amount, $delamt, $total)";
if(!$conn->query($sql))
    die('주문처리 중에 오류가 발생!! Error : '.$conn->error);
#2. cart 테이블에서 레코드 검색한 다음 orditem 테이블에 추가.
$sql = "select * from cart where userid = '$userid'";
$result = $conn->query($sql);
if(!$result)
    die('장바구니 검색 중에 오류가 발생!! Error : '.$conn->error);
if($result->num_rows > 0) {
    $seq = 0;
    while($row = $result->fetch_assoc()) {
        $seq++;
        $sellname = $row['sellname'];
        $qty = $row['qty'];
        $price = $row['price'];
        $sql = "insert into orditem values('$ordno', $seq, '$sellname', $qty, $price)";
        if(!$conn->query($sql))
            die('주문상세 처리 중에 오류가 발생!! Error : '.$conn->error);
    }
}
#3. cart 테이블에서 데이터 삭제
$sql = "delete from cart where userid = '$userid'";
if(!$conn->query($sql))
    die('장바구니 삭제 중에 오류가 발생!! Error : '.$conn->error);
echo "<script>alert('배달주문이 완료되었습니다.'); location.href='index.php'</script>";
?>