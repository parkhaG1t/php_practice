<?php
#1. DB 접속
include_once('../connect.php');
#2. 폼 데이터 읽어오기
$email = $_POST['email'];
$uid = $_POST['uid'];
$pwd = $_POST['pwd'];
$pwd2 = $_POST['pwd2'];
$uname = $_POST['uname'];
$telno = $_POST['telno'];
$loc = $_POST['loc'];
$birth = $_POST['birth'];


// $rdate = date("Y/m/d"); 	// 컴퓨터의 현재 날짜를 년/월/일 형식으로 가져오기

// 필수 항목 입력 확인
if( $uid == "" || $email =="" || $pwd == "" || $pwd2 == "" || $uname == "" ) {
	die("<script>alert('* 는 필수 항목입니다 반드시 입력해주세요.');history.back()</script>");
}
// 약관에 동의했는지 확인
if(!(isset($_POST['terms1']) && isset($_POST['terms2']))) {
	die("<script>alert('약관에 동의해주세요.'); history.back()</script>");
}
// 이미 가입된 이메일이 있는지 확인
$result = $conn->query("select * from user where email = '$email'");
if( isset($result) && !($result->num_rows == 0)) {
	die("<script>alert('이미 가입된 이메일이 존재합니다.'); history.back()</script>");
}
// 같은 아이디가 존재하는지 확인
$result = $conn->query("select * from user where id = '$uid'");
if( isset($result) && !($result->num_rows == 0)) {
	die("<script>alert('같은 아이디가 존재합니다. 다른 아이디로 시도해주세요.'); history.back()</script>");
}
// 입력한 비밀번호가 같은지 확인
if(!($pwd === $pwd2)) {
	die("<script>alert('입력한 비밀번호가 서로 다릅니다.'); history.back()</script>");
}

#3. INSERT SQL 작성
$sql = "insert into user values('$email', '$uid', '$pwd', '$uname', '$telno', '$loc', '$birth')";
#4. SQL 실행
if($conn->query($sql)){
	echo "<script>alert('회원가입 성공!! 메인 페이지로 이동합니다.');
		location.href = '../index.php';
		</script>";
}
else{
	echo "<script>alert('회원가입 중 오류가 발생했습니다.');</script>".$conn->error;
	echo "<script>location.href = '../index.php';</script>";
}
?>