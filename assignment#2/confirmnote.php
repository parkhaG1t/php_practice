<!doctype html>
<html>
	<head>
		<title>기록조회</title>
		<meta charset="utf-8">
		<style>
		.container {
			border-radius: 5px;
			background-color: #f2f2f2;
			padding: 20px;
			position: relative;
		}
		table {
			text-align: center;
			margin-left: auto;
			margin-right: auto;
			border-spacing: 30px;
			font-size: 20px;
		}
		td {
			font-size: 15px;
		}
		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			position: absolute;
			bottom: 0px;
			right: 0px;
		}
		input[type=submit]:hover {
			background-color: #45a049;
		}
		a {
		text-decoration: none;
		font-size: 20px;
		}
		</style>
	</head>
	<body>
		<h2>기록 확정</h2>
		<hr>
		<a href="index.php">메인 페이지</a>
		<div class="container">
			<table>
				<tr>
					<th>no</th>
					<th>email</th>
					<th>money</th>
					<th>io</th>
					<th>note</th>
					<th>iodate</th>
					<th>memo</th>
					<th>confirm</th>
					<th>기록확정</th>
				</tr>
				<?php
				session_start();
				if(!isset($_SESSION['uid'])) {
					echo "<script> var result = confirm('로그인이 되어있지 않습니다');
					if(result) location.href='signin.html';
					else location.href='index.php';</script>";
				}
				include_once('connect.php');
				$email = $_SESSION['uid'];
				$sql = "select * from moneynote where email = '$email' and confirm = 'N'";
				$result = $conn->query($sql);
				
				if(!$result)	// $result가 false인 경우 체크. SQL에 오류가 있거나 실행 중에 문제가 생겼을 때
					die('SELECT 구문 실행 오류 : '.$conn->error);
				if($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
				?>
				<form method="post">
				<tr>
					<td><?=$row['no']?></td>
					<td><?=$row['email']?></td>
					<td><?=$row['money']?></td>
					<td><?=$row['io']?></td>
					<td><?=$row['note']?></td>
					<td><?=$row['iodate']?></td>
					<td><?=$row['memo']?></td>
					<td><?=$row['confirm']?></td>
					<td><input type="checkbox" name="con[]" value="<?=$row['no']?>"></td>
				</tr>
				<?php
					}
				?>
				<input type="submit" value="Submit">
				</form>
				<?php
				}
				else
					echo "검색된 내용이 없습니다...";
				if(isset($_POST['con'])){
					for($i=0; $i<count($_POST['con']); $i++){
						$con = $_POST['con'];
						$idx = (int)$con[$i];
						$sql = "update moneynote set confirm='Y' where email = '$email' and no = $idx";
						$conn->query($sql);
					}
					
					echo "<script>alert('기록확정 성공 !!'); location.href='index.php';</script>";
				}
				?>
			</table>
		</div>
	</body>
</html>