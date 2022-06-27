<?php
session_start();
#1. Database connection
include_once('connect.php');

$ordernum = $_POST['ornum'];


$sql = "delete from ord where ordernum = '$ordernum'";
if($conn->query($sql)) {
    echo "<script>alert('주문 취소 성공!!!'); history.back();</script>";
} else {
    echo "<script>alert('주문 오류 발생!".$conn->error()."');history.back();</script>";
}

?>