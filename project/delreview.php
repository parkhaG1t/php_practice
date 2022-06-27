<?php

session_start();
$uid = $_SESSION['uid'];
$logged = false;
    if(isset($_SESSION['uid'])) { 
        $uid = $_SESSION['uid'];
        $uname = $_SESSION['uname'];
        $logged = true;
	}
#1. Database connection
include_once('connect.php');

$title = $_POST['title'];
$author = $_POST['author'];

$sql = "delete from review where id = '$uid' and title = '$title' and author = '$author'";

if($conn->query($sql)) {
    echo "<script>alert('리뷰 삭제 완료!!!'); location.href='index.php';</script>";
} else {
    echo "<script>alert('리뷰 삭제 오류 발생!!!'); location.href='index.php';</script>";
}
?>