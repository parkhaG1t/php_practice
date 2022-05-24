<?php
include_once('connect.php');
session_start();

$email = $_SESSION['uid'];

$money = intval($_POST['money']);
$io = $_POST['io'];
$note = $_POST['note'];
$iodate = $_POST['iodate'];
$memo = $_POST['memo'];
$idx = intval($_POST['idx']);


$sql = "update moneynote set money = $money, io = '$io', note = '$note', iodate = '$iodate', memo = '$memo' where email = '$email' and no = $idx";

if($conn->query($sql)) {
	echo "<script>alert('수정 성공 !!');</script>";
	echo "<script>location.href='modnote.php'</script>";
}
else
	echo "수정중 오류 발생 : ".$conn->error;
?>