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
		.container a {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			margin-top: 10px;
			float: right;
			text-decoration: none;
		}
		.container a:hover {
			background-color: #45a049;
		}
		a {
		text-decoration: none;
		font-size: 20px;
		}
		</style>
	</head>
	<body>
		<h2>기록 조회</h2>
		<hr>
		<a href="index.php">메인 페이지</a>
		<div class="container">
			<a href="search.php">조건 검색</a>
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
				
				
				if(isset($_POST['io']) && isset($_POST['note']) && isset($_POST['iodate'])){
					$io = $_POST['io'];
					$note = $_POST['note'];
					$iodate = $_POST['iodate'];
					
					
					$sql = "select * from moneynote where email ='$email' and io = '$io' and note = '$note' and iodate = '$iodate'";
					$result = $conn->query($sql);
				} 
				else {
					$sql = "select * from moneynote where email = '$email'";
					$result = $conn->query($sql);
				}
					
				
				if($result->num_rows == 0) {
					echo "<script>alert('검색된 데이터 없음 ...');</script>";
					echo "<script>location.href='index.php'</script>";
				} else {
					while($row = $result->fetch_assoc()) {
				?>
				<tr>
					<td><?=$row['no']?></td>
					<td><?=$row['email']?></td>
					<td><?=$row['money']?></td>
					<td><?=$row['io']?></td>
					<td><?=$row['note']?></td>
					<td><?=$row['iodate']?></td>
					<td><?=$row['memo']?></td>
					<td><?=$row['confirm']?></td>
				</tr>
				<?php
					}
				}
				?>
			</table>
		</div?
	</body>
</html>