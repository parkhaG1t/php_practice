<?php
#0. 세션 처리 시작하기
session_start();	// 이 페이지에 대해서 세션 데이터 처리하고자 한다.
#1. DB 접속
include_once('connect.php');
#2. 폼 데이터 읽어오기
$email = $_POST['email'];
$pwd = $_POST['pwd'];
#3. SELECT SQL 작성
$sql = "select * from member where email = '$email' and passwd = '$pwd'";
#4. SQL 실행
$result = $conn->query($sql);
if(isset($result) && $result->num_rows > 0) {
	$row = $result->fetch_assoc();	// 검색된 레코드 한개를 연관배열로 가져온다.
	// 세션 데이터 생성
	
	$_SESSION['uid'] = $email; 	// $_SESSION은 연관배열. uid 키 생성하고 값으로 $email 저장
	$_SESSION['uname'] = $row['name'];	// 세션 키 uname = user 테이블의 name 컬럼
	
	echo "로그인 성공!! <a href='index.php'>메인 페이지</a>로 이동<br>";
}
else
	echo "이메일 또는 비밀번호가 맞지 않습니다.";

?>