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
		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}
		input[type=submit]:hover {
			background-color: #45a049;
		}
		input[type=text] {
			width: 100px;
		}
		label {
			padding: 12px 12px 12px 0;
			display: inline-block;
		}
		a {
		text-decoration: none;
		font-size: 20px;
		}
		</style>
	</head>
	<body>
		<h2>기록 변경 및 삭제</h2>
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
					<th>modify</th>
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
				$sql = "select * from moneynote where email = '$email'";
				$result = $conn->query($sql);
				
				if(!$result)	// $result가 false인 경우 체크. SQL에 오류가 있거나 실행 중에 문제가 생겼을 때
					die('SELECT 구문 실행 오류 : '.$conn->error);
					
				if($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
				?>
				<form method="post" action="modnoteproc.php">
				<tr>
					<td><?=$row['no']?></td>
					<td><?=$row['email']?></td>
					<td><input type="text" name="money" value="<?=$row['money']?>"</td>
					<td><input type="text" name="io" value="<?=$row['io']?>"</td>
					<td><input type="text" name="note" value="<?=$row['note']?>"</td>
					<td><input type="date" name="iodate" value="<?=$row['iodate']?>"</td>
					<td><input type="text" name="memo" value="<?=$row['memo']?>"</td>
					<td><?=$row['confirm']?></td>
					<input type="text" name="idx" value="<?=(int)$row['no']?>" hidden>
					<td><input type="submit" value="Submit"></form><form method="post" action='delnote.php'>
					<input type="text" name="idx" value="<?=$row['no']?>" hidden>
					<input type="submit" value="delete"></form>
					</td>
				</tr>
				
				<?php
					}
				}
				else
					echo "검색된 내용이 없습니다...";
				
				?>
			</table>
		</div>
	</body>
</html>