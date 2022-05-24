<?php
session_start();
if(!isset($_SESSION['uid'])) {	// 로그인 체크
	echo "<script> var result = confirm('로그인이 되어있지 않습니다');
	if(result) location.href='signin.html';
	else location.href='index.php';</script>";
}
	

include_once('connect.php');
$email = $_SESSION['uid'];
$money = (int)$_POST['money'];
$inout = $_POST['inout'];
$note  = $_POST['note'];
$date  = $_POST['date'];
$memo  = $_POST['memo'];

$sql = "insert into moneynote(email, money, io, note, iodate, memo) values('$email', $money, '$inout', '$note', '$date', '$memo')";

if($conn->query($sql)) 
	echo "기록 성공 !! <a href='index.php'>메인 페이지</a>로 이동<br>";
else
	echo "기록중 오류가 발생했습니다.".$conn->error;

?>