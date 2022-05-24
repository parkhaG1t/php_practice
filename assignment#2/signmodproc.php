<?php
session_start();
#1. DB 접속
include_once('connect.php');
#2. 폼 데이터 읽어오기
$email = $_POST['email'];
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$telno = $_POST['telno'];
#3. UPDATE SQL 작성
$sql = "update member set passwd = '$pwd', name = '$uname', telno = '$telno'
		where email = '$email'";
#4. SQL 실행
if($conn->query($sql)){
	$_SESSION['uname'] = $uname;	// 세션 데이터 변경
	echo "회원정보수정 성공!! <a href='index.php'>메인 페이지</a>로 이동<br>";
}
else
	echo "회원정보수정 중에 오류가 발생했습니다.".$conn->error;

?>