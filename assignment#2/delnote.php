<?php
include_once('connect.php');
session_start();

$email = $_SESSION['uid'];
$idx = intval($_POST['idx']);


$sql = "delete from moneynote where email = '$email' and no = $idx";

if($conn->query($sql)){
	echo "<script>alert('삭제 성공 !!')</script>";
	echo "<script>location.href='modnote.php';</script>";
}
else
	echo "삭제중 오류 발생. : ".$conn->error;


?>