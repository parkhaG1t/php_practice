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
    $cart = 0;
    if($logged) {
        $sql = "select count(id) as cnt from cart where id = '$uid'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $cart = $row['cnt'];
    } else {
        echo "<script>alert('로그인 후 작성해주세요');location.href='login/signup.html';</script>";
    }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Apple Book Store</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <style>
            * {
            box-sizing: border-box;
            }
            .cart > a {
                text-decoration:none;
                color: black;
            }
            .cart > a:hover {
                color: gray;
            }
            .material-icons.md-36 { 
                font-size: 36px;
            }
            .material-icons.md-light { 
                color: rgba(255, 255, 255,0.7);
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

            }
            a {
                text-decoration: none;
                color:white;
                text-align:center;
            }
            .header a {
                text-decoration: none;
                display: inline-block;
                text-decoration: none;
                color: black;
                font-family: "Helvetica Nene", Helvetica, Arial, sans-serif;
                font-size: 30px;
            }
            .header a:hover {
                color: black;
            }
            h2 {
                font-family: "Helvetica Nene", Helvetica, Arial, sans-serif;
            }
            #loginbtn { 
                height:40px; 
                padding-top:7px; 
                border-radius:4px;
                background-color:forestgreen;
                padding-left:5px;
                padding-right:5px;
            }
            .uname {
                font-family: 'Nanum Gothic', sans-serif; 
                margin-right:5px; 
                height:40px; 
                padding-top:10px;
            }
            #signupbtn {
                padding-left:5px;
                padding-right:5px;
                margin-right:5px; 
                height:40px; 
                padding-top:7px;
                border-radius:4px;
                background-color:Darkslategray;
            }
            .lbtn, .sbtn {
                text-decoration:none;
                color:white;
                font-family: 'Nanum Gothic', sans-serif; 
            }
            .lbtn:hover {
                color:black;
            }
            .sbtn:hover {
                color:black;
            }
            .uname > a {
                text-decoration:none;
                color: black;
            }
            .logout > a {
                text-decoration:none;
                color: black;
            }
            .logout > a:hover {
                color: gray;
            }
            .menubar {
                z-index:2;
                position:fixed;
                right:30px;
                bottom:30px;
            }
            .top, .menu {
                background-color:darkolivegreen;
                border-radius:50%;
                padding:5px;
                margin:auto;
            }
            .top:hover {
                cursor:pointer;
                box-shadow: inset 0px 2px 5px 2px black;
            }
            .menu:hover {
                cursor:pointer;
                box-shadow: inset 0px 2px 5px 2px black;
            }
            .menu:hover #menuicon {
                color: orangered;
            }
            .top:hover #topicon {
                color: orangered;
            }
            #opencon {
                font-family: 'Nanum Gothic', sans-serif;
                background-color:rgba(0,0,0,0);
                position:fixed;
                width:auto;
                height:124px;
                left:25px;
                right:25px;
                bottom:10px;
                border-radius:10px;
                margin:0px;
                color:white;
                font-size:15px;
                opacity:0.9;
                display:none;
                z-index:1;
            }
            @media(max-width:680px) {
                #opencon {
                    font-size:10px;
                }
            }
            .menulist {
                display:grid;
                z-index:1;
                list-style:none;
                align-content:center;
                background-color:black;
                <?php
                if(isset($uid) && $uid === 'admin') {
                ?>
                grid-template-rows: repeat(1, 1fr);
                grid-template-columns: repeat(3, 1fr);
                <?php
                } else {
                ?>
                grid-template-columns: repeat(3, 1fr);
                grid-template-rows: repeat(4, 1fr);
                <?php } 
                ?>
                padding-left:0px;
                margin-left:45px;
                margin-right:45px;
                border-radius: 0px 0px 4px 4px;
            }
            .menulist > .fitems {
                text-align:center;
                border-bottom: 4px solid darkolivegreen;
            }
            #i4 {
                grid-row: 2/3;
                grid-column: 2/3;
                display:none;
            }
            #i5 {
                grid-row: 3/4;
                grid-column: 2/3;
                display:none;
            }
            #i6 {
                grid-row: 4/5;
                grid-column: 2/3;
                display:none;
            }
            .menulist > .nitems {
                text-align:center;
                background-color:gray;
                color:black;
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
            .bookimg {
                margin:12px;
                text-align:center;
                height:100%;
            }
            .bookinfo {
                margin-top:12px;
                margin-bottom:12px;
                width:100%;
                background-color:white;
                border-radius:5px;
                padding:15px;
                font-family: 'Nanum Gothic', sans-serif; 
                font-size: 20px;
                color: black;
                opacity: 0.8;
                white-space:normal;
            }
            .bookinfo hr {
                width: 100%;
                height: 2px;
                background-color: black;
            }
            .bookinfo span {
                font-size: 16px;
            }
            .price {
                width:197px;
                font-size:16px;
                margin-top:5px;
            }
            .writereview {
               text-align:end;
            }
            form {
                height:100%;
            }
            .writereview span {
                display:inline-block;
                text-align:center;
                height:30px;
                width:40px;
                font-family: 'Nanum Gothic', sans-serif; 
                font-size:18px;
                color:white;
                background-color:rgba(0,128,0,0.8);
                border-radius:4px;
            }
            textarea {
                width:100%;
            }
        </style>
    </head>
    <body>
    <header>
                <!-- navbar -->
                <nav class="navbar navbar-light bg-light">
                    <div class="container-fluid row">
                        <a class="navbar-brand col-xl fs-3 justify-content-center" href="index.php"><img src="images/logo1.png" style="width:40px; height:40px" class="d-inline-block align-text-top">Ápple<img src="images/logo2.png" style="position:relative;right:5px; width:35px; height:35px;"></a>
                        
                        <ul class="nav navbar-nav col-xl-8 justify-content-center">
                            <li class="nav-item">
                                <form class="d-flex" action="findbook.php" method="post">
                                    <input class="form-control me" type="search" name='bookname' placeholder="책 검색">
                                    <button class="btn btn-outline-success" style="padding:0px 5px 0px 5px" type="submit"><span class="material-icons">
                                    search
                                    </span></button>
                                </form>
                            </li>
                        </ul>
                        <ul class="nav navber-nav navbar-right col-xl justify-content-center">
                            <?php
                                if(!$logged) {
                            ?>
                            <li id="loginbtn"><a href="login/signin.html" class="lbtn">로그인</a></li>
                            <li id="signupbtn"><a href="login/signup.html" class="sbtn">회원가입</a></li>
                            <?php } 
                            else if($uid === 'admin') {
                            ?>
                            <li class="uname"><?= $_SESSION['uname'] ?> 님</li>
                            <li style="height:40px;"><span class="material-icons md-36" style="width:36px; height:36px;">
                            admin_panel_settings</span></li>
                            <li class="logout" style="height:40px;"><a href="javascript:logout();"><span class="material-icons md-36" style="width:36px; height:36px;">
                            logout</span></a></li>
                            <?php
                            } else {    
                            ?>
                            <li class="uname"><a href="login/signmodify.php"><?= $_SESSION['uname'] ?> 님</a></li>
                            <li class="logout" style="height:40px;"><a href="javascript:logout();"><span class="material-icons md-36" style="width:36px; height:36px;">
                            logout</span></a></li>
                            <li class="cart" style="height:40px; position:relative;"><a href="cart.php"><span class="material-icons md-36" style="width:36px; height:36px;">
                            shopping_cart</span></a><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?= $cart ?>
                            </span></li>
                            <?php } ?>
                        </ul>
                    </div>
                </nav>
        </header>


        <!-- menubar -->
        <div class="menubar">
            <div class="top">
            <a href="#">
            <span class="material-icons md-light md-36" id="topicon">expand_less</span>
            </a>
            </div>
            <div class="menu">
            <span class="material-icons md-light md-36" id="menuicon" onclick="openTog()">menu</span>
            </div>
        </div>

        <!-- content menu -->
        
        <div id="opencon" class="container-fluid">
            <ul class="menulist" style="margin-bottom:0px">
            <?php
                if(isset($uid) && $uid === 'admin') {
            ?>
                <li id="i1" class="fitems"><a href="index.php">Home</a></li>
                <li id="i2" class="fitems"><a href="usermanage.php">회원관리</a></li>
                <li id="i3" class="fitems"><a href="addbook.php">입고</a></li>
            <?php
                } else {
            ?>
                <li id="i1" class="fitems"><a href="index.php">Home</a></li>
                <li id="i2" class="fitems"><a href="#1">회원정보</a></li>
                <li id="i3" class="fitems"><a href="event.html">이벤트</a></li>
                <li id="i4" class="nitems"><a href="orderlist.php">주문목록</a></li>
                <li id="i5" class="nitems"><a href="cart.php">장바구니</a></li>
                <li id="i6" class="nitems"><a href="login/signmodify.php">정보수정</a></li>
            <?php
                }
            ?>
            </ul>
        </div>


        <div class="container">
            <div class="header">
                <h2>review</h2>
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

            <?php
                $title = $_POST['title'];
                $author = $_POST['author'];

                $sql= "select title from ord where id = '$uid'";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    $ordtitle = explode(', ', $row['title']);
                    for($i=0; $i<count($ordtitle); $i++) {
                        if($title === $ordtitle[$i]) {
                            $ord = 1;
                            break;
                        }
                    }
                }
                if($ord != 1) {
                    echo "<script>alert('책을 구입하신 후 리뷰를 작성해주시길 바랍니다'); location.href='index.php';</script>";
                }

                $sql = "select imgname, price from books where title = '$title' and author = '$author'";

                $result = $conn->query($sql);
                $row = $result->fetch_assoc()
            ?>

            <div class="book container-fluid">
            <div class="row">
                <!-- Book Image -->
                <div class="col-md-6">
                    <div class="bookimg">
                        <?php
                            if($row['imgname'] == Null) {
                        ?>
                        <img src="images/notreadyimg.jpg">
                        <?php } 
                        else {
                        ?>
                        <img src="images/books/<?= $row['imgname'] ?>"><br>
                        <span class="price badge bg-primary"><?= $row['price'] ?> 원</span>
                        <?php }
                        ?>
                    </div>
                </div>
                
                <div class="writereview col-md-6 align-self-center" style="flex-wrap:wrap">
                    <?php
                        $sql2 = "select * from review where id = '$uid' and title = '$title' and author = '$author'";

                        $result2 = $conn->query($sql2);
                    
                        if($result2->num_rows > 0) {
                            $row2 = $result2->fetch_assoc();
                    ?>
                    <form action="delreview.php" method="post">
                        <span>평점</span>
                        <input type="number" readonly name="score" value="<?= $row2['score'] ?>">
                        <input type="text" name="title" value="<?= $title ?>" hidden>
                        <input type="text" name="author" value="<?= $author ?>" hidden>
                        <textarea readonly><?= $row2['review'] ?></textarea>
                        <input type="submit" value="삭제">
                    </form>
                    <?php } else {
                    ?>
                    <form action="addreview.php" method="post">
                        <span>평점</span>
                        <input type="text" name="title" value="<?= $title ?>" hidden>
                        <input type="text" name="author" value="<?= $author ?>" hidden>
                        <input type="number" name="score" max=5 min=1 value="1"><br>
                        <textarea name="review" placeholder="Write Review..."></textarea>
                        <input type="submit" value="작성완료">
                    </form>
                    <?php   }
                    ?>
                </div>
            </div>
        </div>
        
        
            
        </div>
    </body>
    <script>
        function openTog() {
            if(document.getElementById('opencon').style.display === 'block') {
                document.getElementById('opencon').style.display = 'none';
            } else {
                document.getElementById('opencon').style.display = 'block';
            }
        }

        $( document ).ready( function() {
            $( '#i2' ).mouseenter( function() {
                $( '#i4' ).css("display", "block");
                $( '#i5' ).css("display", "block");
                $( '#i6' ).css("display", "block");
            }); 
            $( '#i2' ).mouseleave(function() {
                $( '#i6, #i4, #i5' ).css("display", "none");
            });
        });

        $( document ).ready( function() {
            $( '#i4, #i5, #i6' ).mouseenter( function() {
                $( '#i4' ).css("display", "block");
                $( '#i5' ).css("display", "block");
                $( '#i6' ).css("display", "block");
            }); 
            $( '#i4, #i5, #i6' ).mouseleave(function() {
                $( '#i6, #i4, #i5' ).css("display", "none");
            });
        });

        function logout() {
            var l = confirm("정말 로그아웃 하시겠습니까?") 
            if ( l == true ) {
                location.href = "login/signout.php";
            }
        }
    </script>
</html>