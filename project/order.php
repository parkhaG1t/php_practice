<?php
session_start();
#1. Database connection
include_once('connect.php');

if(!isset($_POST['del'])) {
    die("<script>alert('아무것도 선택하지 않으셨습니다.'); history.back();</script>");
}

$del = $_POST['del'];
$sumprice = 0;
?>

<DOCTYPE HTML>
<html>
    <head>
        <style>
            * {
            box-sizing: border-box;
            }
            body {
                height: 100vh;
                background-image: url("images/orderbg.jpg");
                background-size: cover;
                background-repeat: no-repeat;
            }
            .container {
                position:relative;
                border-radius: 5px;
                padding: 20px;
                background-color: white;
                opacity: 0.9;
                width: 80%;
                margin-left:auto;
                margin-right:auto;
                margin-top:100px;
                margin-bottom:100px;
            }
            h2 {
                font-family: "Helvetica Nene", Helvetica, Arial, sans-serif;
                position: absolute;
                left: 20px;
                top: 5px;
            }
            a {
                display: inline-block;
                text-decoration: none;
                color: black;
            }
            .header {
                width: 100%;
                text-align: center;
            }
            .logo {
                text-align: center;
                font-family: "Helvetica Nene", Helvetica, Arial, sans-serif;
                font-size: 30px;
            }
            input[type="text"],
            input[type="password"],
            input[type="number"],
            input[type="file"],
            select,
            textarea {
                width: 100%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                resize: vertical;
            }
            input[type="file"] {
                background-color:white;
            }
            input[name="intro"] {
                width: 100%;
                padding: 12px;
                margin-bottom:5px;
                border: 1px solid #ccc;
                border-radius: 4px;
                resize: vertical;
                height: 100px;
            }
            label {
                font-family: "Nanum Gothic", sans-serif;
                padding: 12px 12px 12px 0;
                display: inline-block;
            }
            input[type="submit"] {
                background-color: #4caf50;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                margin-top: 10px;
                float: right;
            }
            input[type="submit"]:hover {
                background-color: #45a049;
            }
            .col-25 {
                float: left;
                width: 25%;
                margin-top: 6px;
            }
            .col-75, .sum {
                float: left;
                width: 75%;
                margin-top: 6px;
            }
            /* Clear floats after the columns */
            .row:after {
                content: "";
                display: table;
                clear: both;
            }
        </style>
    </head>
    <body>
        <div class="container">
        <div class="header">
            <h2>Order</h2>
            <div class="logo">
            <a href="index.php"
                ><img
                src="images/logo1.png"
                style="width: 40px; height: 40px" />Ápple
                <img
                src="images/logo2.png"
                style="
                    width: 35px;
                    height: 35px;
                    position: relative;
                    left: -10px;
                    bottom: -5px;
                "
            /></a>
            </div>
        </div>
        <hr />
        <form action="orderproc.php" method="post">
        <div class="orderlist">
            <ol style="padding-left:0px;">
                <?php
                    for($i=0; $i<count($del); $i++) {
                        $sql="select title, author from books where imgname = '$del[$i]'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                ?>
                <input type="text" name="title[]" value="<?= $row['title'] ?>" hidden>
                <input type="text" name="author[]" value="<?= $row['author'] ?>" hidden>
                <div class="row">
                    <div class="col-25">
                    <label for="fname">구매 목록</label>
                    </div>
                    <div class="col-75">
                    <li><?= $row['title'] ?></li>
                    <ul>
                        <li><?= $row['author'] ?></li>
                    </ul>
                    </div>
                </div>
                <?php
                
                }
                ?>
            </ol>
        </div>
        <hr>
        
        <div class="orderinfo">
            
                <div class="row">
                    <div class="col-25">
                        <label for="fname">배송 주소</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="loc" placeholder="Delivary Location..">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">핸드폰 번호</label>
                    </div>
                    <div class="col-75">
                    <input type="text" name="phone" placeholder="Phone Number..">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">이름</label>
                    </div>
                    <div class="col-75">
                    <input type="text" name="name" placeholder="Name..">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-25">
                        <label for="fname">결제 방법</label>
                    </div>
                    <div class="col-75">
                        <select name="payment">
                            <option value="핸드폰">핸드폰</option>
                            <option value="무통장 입금">무통장 입금</option>
                            <option value="카드 결제">카드 결제</option>
                        </select>
                    </div>
                </div>
                
            
            <hr>
        </div>
        
        <div class="payment">
            <ol style="padding-left:0px;">
                <div class="row">
                    <div class="col-25">
                    <label for="fname">결제 금액</label>
                    </div>
                    <div class="col-75">
        <?php
            for($i=0; $i<count($del); $i++) {
                $sql="select * from books where imgname = '$del[$i]'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
            ?>
                <li><?= $row['title'] ?></li>
                <ul>
                    <li><?= $row['price'] ?></li>
                </ul>
                <?php   
                    $sumprice += $row['price'];
                    $sql="delete from cart where title = '".$row['title']."' and author = '".$row['author']."'";
                        $conn->query($sql);
                }
                
                ?>
                </div>
            </div>
            </ol>
            <hr>
            
            <div class="row">
                    <div class="col-25">
                        <label for="fname">합계</label>
                    </div>
                    <div class="col-75">
                    <span class="sum"><?= $sumprice ?> 원 ...</span>
                    </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <input type="number" name="price" value="<?= $sumprice ?>" hidden>
          <input type="submit" value="Submit" />
        </div>
        </form>
    </body>
</html>
