<?php
# Database connect
$server = "localhost";
$user = "root";
$passwd  = "";
$dbname = "applebooks";
// mysqli : MySQL DB 처리하는 클래스. $conn 는 객체변수
$conn = new mysqli($server, $user, $passwd, $dbname);
if($conn->connect_error){
	die("MoneyWeb DB 접속 오류");
}
?>