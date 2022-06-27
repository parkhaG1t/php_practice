<?php
# 회원탈퇴는 로그인한 사용자의 이메일로 user 테이블에서 레코드 삭제하기
session_start();
if(isset($_POST['uemail'])) {
	$uid = $_POST['uemail'];
} else {
	$uid = $_SESSION['uid'];
}
include_once('../connect.php');
$sql = "delete from user where email = '$uid'";	// 삭제하는 구문.

if(isset($_POST['uemail'])) {
	if($conn->query($sql)){
		echo "<script>alert('$uid 회원삭제 성공!!.'); history.back();</script>";
	}
	else {
		echo "<script>alert('회원삭제 오류 발생!!.'); history.back();</script>";
	}
}
else {
	if($conn->query($sql)){
		session_destroy();
		echo "<script>alert('회원탈퇴 성공!! 메인 페이지로 이동합니다.');
			location.href = '../index.php';
			</script>";
	}
	else {
		echo "<script>alert('회원탈퇴 중에 오류가 발생했습니다.');
			location.href = '../index.php';
			</script>";
	}
}
?>