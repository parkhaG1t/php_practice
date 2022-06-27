<?php
session_start();

// echo "<script>alert(".$_SESSION['order'].");</script>";

#1. Database connection
include_once('connect.php');

if(!isset($_POST['del'])) {
    die("<script>alert('아무것도 선택하지 않으셨습니다.'); history.back();</script>");
}

$del = $_POST['del'];

for($i=0; $i<count($del); $i++) {
    $sql="select title, author from books where imgname = '$del[$i]'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $sql="delete from cart where title = '".$row['title']."' and author = '".$row['author']."'";
    $conn->query($sql);
}

echo "<script>alert('삭제되었습니다.'); location.href='cart.php';</script>";
?>
