<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>Page Title</title>
</head>
<body>

	<h1 style="color: blue;">This is a Heading</h1>
	<p style = "color: orange;">This is a paragraph.</p>



<?php
echo "원의 넓이 구하기<br>";
define("PHI", 3.1415);
$r = $_GET['r']?? $r = 5;

$circleAria = $r ** 2 * PHI;

echo "반지름 $r 인 원의 넓이는 $circleAria 입니다 <br><hr>";
?>

</body>
</html>
