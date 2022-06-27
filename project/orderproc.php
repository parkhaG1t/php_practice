<?php
session_start();
#1. Database connection
include_once('connect.php');

$date = date("Y-m-d", time());
$id = $_SESSION['uid'];
$title = $_POST['title'];
$author = $_POST['author'];
$loc = $_POST['loc'];
$phone = $_POST['phone'];
$name = $_POST['name'];
if($name === "") {
    $name = $_SESSION['uid'];
}
$price = $_POST['price'];
$payment = $_POST['payment'];


$sql = "SELECT MAX(ordernum) as maxno FROM ord";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$maxno = $row['maxno'] +1;

$atitle = "";
$aauthor = "";

for($i=0; $i<count($title); $i++) {
    if($i == count($title) - 1) {
        $atitle .= $title[$i];
        $aauthor .= $author[$i];
    } else {
        $atitle .= $title[$i].", ";
        $aauthor .= $author[$i].", ";
    }
}



$sql2 = "insert into ord values($maxno, '$atitle', '$aauthor', '$id', $price, '$payment', '$loc', '$phone', '$name', '$date')";
$conn->query($sql2);

echo "<script>alert('주문 접수!!!'); location.href='index.php';</script>";
?>