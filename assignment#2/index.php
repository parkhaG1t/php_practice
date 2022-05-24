<!doctype html>
<html>
	<head>
		<title>Assignment2</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
				body {
				  background: #e2e1e0;
				  text-align: center;
				}
				h1 {
					text-align: center;
					padding: 32px;
				}
				/* Add a black background color to the top navigation */
				.topnav {
					background-color: #333;
					overflow: hidden;
				}
	 
				/* Style the links inside the navigation bar */
				.topnav a {
				  float: left;
				  color: #f2f2f2;
				  text-align: center;
				  padding: 14px 16px;
				  text-decoration: none;
				  font-size: 17px;
				}
	 
				/* Change the color of links on hover */
				.topnav a:hover {
				  background-color: #ddd;
				  color: black;
				}
	 
				/* Add a color to the active/current link */
				.topnav a.active {
				  background-color: #4CAF50;
				  color: white;
				}
	 
				/* Right-aligned section inside the top navigation */
				.topnav-right {
				  float: right;
				}
				ul {
					list-style:none;
				}
				ul a {
					text-decoration: none;
					color: white;
					font-weight:bold;
				}
		</style>
	</head>
	<body>
		<?php
			session_start();
			$logged = false;
			if(isset($_SESSION['uid'])) {  // 세션에 email 키가 정의되어 있으면 
				$uid = $_SESSION['uid'];
				$uname = $_SESSION['uname'];
				$logged = true;
			}
			#1. Database connection
			include_once('connect.php');
			
		?>
		<div class="topnav">
		<?php
			if(!$logged) {
				echo "<a href='signup.html'>회원가입</a>";
				echo "<a href='signin.html'>로그인</a>";
			}
			else {
				echo "<a href=''>{$uname}님 환영합니다.</a>";
				echo "<a href='signout.php'>로그아웃</a>";
				echo "<a href='signmodify.php'>회원정보수정</a>";
				echo "<a href='signdel.php'>회원탈퇴</a>";
			}
		?>
		</div>
		<h1>Assignment #2</h1>
		<div class="menu">
		 <ul>
			<li style="background-color:Darkred; padding: 10px; 10px;"><a href="writenote.html">용돈 기록</a></li>
			<li style="background-color:Darkgoldenrod; padding: 10px; 10px;"><a href="confirmnote.php">기록 확정</a></li>
			<li style="background-color:Darkslategray; padding: 10px; 10px;"><a href="modnote.php">기록변경 및 삭제</a></li>
			<li style="background-color:Darkslateblue; padding: 10px; 10px;"><a href="shownote.php">기록조회</a></li>
		 </ul>
		</div>
	</body>
</html>
