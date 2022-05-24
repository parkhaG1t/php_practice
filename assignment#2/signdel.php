<?php
# 회원탈퇴는 로그인한 사용자의 이메일로 user 테이블에서 레코드 삭제하기
session_start();
$email = $_SESSION['uid'];
include_once('connect.php');
$sql = "delete from member where email = '$email'";	// 삭제하는 구문.
if($conn->query($sql)){
	session_destroy();
	echo "회원탈퇴 성공!! <a href='index.php'>메인 페이지</a>로 이동<br>";
}
else
	echo "회원탈퇴 중에 오류가 발생했습니다.".$conn->error;
?>