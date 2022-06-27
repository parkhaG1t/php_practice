<?php
session_start();
$logged = false;
if(isset($_SESSION['uid'])) { 
    $uid = $_SESSION['uid'];
    $uname = $_SESSION['uname'];
    $logged = true;
}
if(!$logged) {
    echo "<script>alert('로그인 후 다시 시도해주세요.'); location.href = 'login/signin.php';</script>";
}
#1. Database connection
include_once('connect.php');

#2. 값 가져오기
$title = $_POST['title'];
$author = $_POST['author'];

$qty=1;
if(isset($_POST['qty'])) {
    $qty = $_POST['qty'];
}
#3. INSERT
$sql = "select qty from cart where id = '$uid' and title = '$title' and author = '$author'";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    
        $row = $result->fetch_assoc();
        $qty += $row['qty'];
        $conn->query("update cart set qty = $qty where title = '$title' and author = '$author'");
        echo "<script> var yes;
                    yes = confirm('장바구니로 이동하시겠습니까?');
                    if(yes) location.href='cart.php';
                    else location.href='index.php';
                </script>";
    
} else {
    $sql = "insert into cart values('$uid', '$title', '$author', $qty)";
    if ($conn->query($sql)) {

        echo "<script> var yes;
                yes = confirm('장바구니로 이동하시겠습니까?');
                if(yes) location.href='cart.php';
                else location.href='index.php';
            </script>";
            
    }
    else {
        echo "장바구니 추가 오류 발생 : ".$conn->error;
    }
}
?>