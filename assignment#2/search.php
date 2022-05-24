<!doctype html>
<html>
	<head>
		<title>조건검색</title>
		<meta charset="utf-8">
		<style>
		.container {
			border-radius: 5px;
			background-color: #f2f2f2;
			padding: 20px;
			text-align: center;
		}
		input {
			font-size: 15px;
		}
		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			margin-top: 10px;
			margin-left: 10px;
			font-size: 15px;
		}
		input[type=submit]:hover {
			background-color: #45a049;
		}
		label {
			padding: 12px 12px 12px 0;
			display: inline-block;
		}
		</style>
	</head>
	<body>
	<h2>조건검색</h2><hr>
		<div class="container">
		<form method="post" action="shownote.php">
			<input type="radio" name="io" value="in">
			<label>수입</label>
			<input type="radio" name="io" value="out">
			<label>지출</label>
			<input type="text" name="note" placeholder="내용 입력..">
			<input type="date" name="iodate">
			<input type="submit" value="search">
		</form>
		</div>
	</body>
</html>