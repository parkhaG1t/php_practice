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

$score = $_POST['score'];
$review = $_POST['review'];
$title = $_POST['title'];
$author = $_POST['author'];

$sql = "insert into review values('$uid', '$title', '$author', $score, '$review')";
if($conn->query($sql)) {
    echo "<script>alert('리뷰 작성 완료!!!'); location.href='index.php';</script>";
} else {
    echo "<script>alert('오류 발생');location.href='index.php';</script>";
}
?>