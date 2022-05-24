<?php
#1. DB 접속
include_once('connect.php');
#2. 폼 데이터 읽어오기
$email = $_POST['email'];
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$telno = $_POST['telno'];
$rdate = date("Y/m/d"); 	// 컴퓨터의 현재 날짜를 년/월/일 형식으로 가져오기
#3. INSERT SQL 작성
$sql = "insert into member values('$email', '$uname', '$pwd', '$telno', '$rdate')";
#4. SQL 실행
if($conn->query($sql))
	echo "회원가입 성공!! <a href='index.php'>메인 페이지</a>로 이동<br>";
else
	echo "회원가입 중에 오류가 발생했습니다.".$conn->error;
?>