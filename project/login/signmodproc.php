<?php
session_start();
#1. DB 접속
include_once('../connect.php');
#2. 폼 데이터 읽어오기
$uid = $_POST['uid'];
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$telno = $_POST['telno'];
$loc = $_POST['loc'];
#3. UPDATE SQL 작성
$sql = "update user set pwd = '$pwd', name = '$uname', phone = '$telno', loc = '$loc' where id = '$uid'";
#4. SQL 실행
if($conn->query($sql)){
	$_SESSION['uname'] = $uname;	// 세션 데이터 변경
	echo "<script>alert('회원정보 수정 성공!! 메인 페이지로 이동합니다.');
		location.href = '../index.php';
		</script>";
}
else
	echo "<script>alert('회원정보수정 중에 오류가 발생했습니다.');
		location.href = '../index.php';
		</script>";
?>