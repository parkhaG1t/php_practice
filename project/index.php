<!-- SESSION START -->
<?php
    session_start();
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
            .material-icons.md-36 { 
                font-size: 36px;
            }
            .material-icons.md-light { 
                color: rgba(255, 255, 255,0.7);
            }
            body {
                background-color: rgba(0, 0, 0, 0.9);
                overflow-x:hidden;
            }
            div {
                white-space:nowrap;
            }
            a {
                text-decoration: none;
                color:white;
                text-align:center;
            }
            a:hover {
                color:darkorange;
            }
            img {
                overflow:hidden;
            }
            h5 {
                text-align:center;
                position: relative;
                top: 0px;
                color:rgba(255, 255, 255, 0.7);
                font-size:15px;
            }
            h6 {
                text-align:center;
                position: relative;
                top: 0px;
                color:rgba(255, 255, 255, 0.7);
                font-size:12px;
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
            .cart > a {
                text-decoration:none;
                color: black;
            }
            .cart > a:hover {
                color: gray;
            }
            .card {
                margin:auto;
                padding:0px;
                width:180px;
                height:280px;
            }
            .card > img {
                width:180px;
                height:280px;
            }
            .card-header {
                position:absolute;
                width:100%;
                height:auto;
                cursor: pointer;
                background-color:rgba(0, 0, 0, 0.8);
                display:none;
            }
            .card-footer {
                position:absolute;
                width:100%;
                padding:5px, 0px, 5px, 0px;
                text-align:center;
                bottom:0px;
                background-color:rgba(0, 0, 0, 0.8);
                display:none;
                justify-content:space-evenly;
            }
            .card-footer button {
                background-color:rgba(0,0,0,0);
                border:none;
            }
            .col-6.col-md-4 {
                margin-top:10px;
                margin-bottom:10px;
            }
            #recobooks, #newbooks {
                background: url(images/bg1.png);
                background-size:cover;
            }
            article {
                z-index:0;
                padding-left:0px;
                padding-right:0px;
                margin-bottom:60px;
            }
            .notesection {
                background-color:rgba(24,24,24);
                text-align:center;
                font-family: 'Open Sans', sans-serif;
                color:rgba(162,162,162);
                font-size:50px;
                margin-left:20px;
                margin-right:20px;
                border-top: 6px solid;
                border-color:Darkolivegreen;
                border-radius: 0px 0px 15px 15px;
            }
            #flexcontainer {
                background-color:rgba(170,170,170);
                padding-top:10px;
                padding-bottom:10px;
            }
            #flexcontainer p {
                margin: 0px 0px 5px 0px;
                font-family: 'Nanum Gothic', sans-serif;
                font-size:10px;
            }
            #logoimg {
                font-family: "Helvetica Nene", Helvetica, Arial, sans-serif;
                font-size:50px;
            }
            #logoimg > #logo1 {
                position:relative;
                left:15px;
            }
            #logoimg > #logo2 {
                position:relative;
                right:20px;
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
            .menulist > .nitems {
                text-align:center;
                background-color:gray;
                color:black;
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
        
        
        <section>
            <!-- slideshow -->
            <article>
                <div class="carousel slide" data-bs-ride="carousel" id="slideshow">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#slideshow" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#slideshow" data-bs-slide-to="1" aria-label="Slide"></button>
                        <button type="button" data-bs-target="#slideshow"        data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>

                    <!-- slide -->
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height:700px">
                            <img src="images/event/ev1.jpg" class="d-block w-100">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>송해 추모전</h3>
                            </div>
                        </div>
                        <div class="carousel-item" style="height:700px">
                            <img src="images/event/ev2.jpg" class="d-block w-100">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>어린이 도서 이벤트</h3>
                            </div>
                        </div>
                        <div class="carousel-item" style="height:700px">
                            <img src="images/event/ev3.jpg" class="d-block w-100">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>한 컷 한국사 출간 이벤트</h3>
                            </div>
                        </div>
                    </div>
                    <!-- left right control -->
                    <a class="carousel-control-prev" role="button" data-bs-target="#slideshow" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" role="button" data-bs-target="#slideshow" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </article>
            
            <!-- card, recommend books -->
            <article class="container" id=recobooks>
                <div class="notesection">
                    <p>Recommend Books</p>
                </div>
                <div class="row">
                    <?php
                        $i=0;
                        $sql = "select * from books order by rand() limit 6";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()) {
                            $title = $row['title'];
                            $author = $row['author'];
                            $lentitle = mb_strlen($row['title'], 'utf-8');
                            $lenauthor = mb_strlen($row['author'], 'utf-8');
                            if ( $lentitle > 15 ){
                                $title = mb_substr($row['title'], 0, 15, 'utf-8');
                                $title .= "...";
                            } else if ( $lenauthor > 15 ) {
                                $author = mb_substr($row['author'], 0, 15, 'utf-8');
                                $author .= "...";
                            }
                            
                    ?>
                    <div class="col-6 col-md-4">
                        <div class="card" id="card<?= $i ?>"style="width:180px; height:280px;">
                            <img src="images/books/<?= $row['imgname'] ?>" class="card-img">
                            <div class="card-header" id="card-header<?= $i ?>">
                                <h5 class="card-title"><?= $title ?></h5>
                                <h6 class="card-text"><?= $author ?></h6>
                            </div>
                            <div class="card-footer" id="card-footer<?= $i ?>">
                                <form action = "findbook.php" method="post" id="search<?= $i ?>">
                                    <input type="text" name="bookname" value="<?= $row['title'] ?>" hidden>
                                    <button type="submit" form="search<?= $i ?>"><span class="material-icons md-light">search</span></button>
                                </form>
                                <form action = "addcart.php" method="post" id="addcart<?= $i ?>">
                                    <input type="text" name="title" value="<?= $row['title'] ?>" hidden>
                                    <input type="text" name="author" value="<?= $row['author'] ?>" hidden>
                                    <button type="submit" form="addcart<?= $i ?>"><span class="material-icons md-light">shopping_cart</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php 
                    $i++;
                    }
                    ?>
                </div>
            </article>
        </section>
                
        <!-- card, new books -->
        <section>
            <article class="container" id="newbooks">
                <div class="notesection">
                    <p>New Books</p>
                </div>
                <div class="row">
                    <?php
                        $sql = "select * from books order by imgname desc limit 6";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()) {
                            $title = $row['title'];
                            $author = $row['author'];
                            $lentitle = mb_strlen($row['title'], 'utf-8');
                            $lenauthor = mb_strlen($row['author'], 'utf-8');
                            if ( $lentitle > 15 ){
                                $title = mb_substr($row['title'], 0, 15, 'utf-8');
                                $title .= "...";
                            } else if ( $lenauthor > 15 ) {
                                $author = mb_substr($row['author'], 0, 15, 'utf-8');
                                $author .= "...";
                            }
                            
                    ?>
                    <div class="col-6 col-md-4">
                        <div class="card" id="card<?= $i ?>"style="width:180px; height:280px;">
                            <img src="images/books/<?= $row['imgname'] ?>" class="card-img">
                            <div class="card-header" id="card-header<?= $i ?>">
                                <h5 class="card-title"><?= $title ?></h5>
                                <h6 class="card-text"><?= $author ?></h6>
                            </div>
                            <div class="card-footer" id="card-footer<?= $i ?>">
                                <form action = "findbook.php" method="post" id="search<?= $i ?>">
                                    <input type="text" name="bookname" value="<?= $row['title'] ?>" hidden>
                                    <button type="submit" form="search<?= $i ?>"><span class="material-icons md-light">search</span></button>
                                </form>
                                <form action = "addcart.php" method="post" id="addcart<?= $i ?>">
                                    <input type="text" name="title" value="<?= $row['title'] ?>" hidden>
                                    <input type="text" name="author" value="<?= $row['author'] ?>" hidden>
                                    <button type="submit" form="addcart<?= $i ?>"><span class="material-icons md-light">shopping_cart</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $i++;
                    }
                    ?>
            </article>
        </section>
        <!-- footer -->
        <footer>
            <div id="flexcontainer" class="row">
                <div id="logoimg" class="col-md-4 col-12 text-md-start text-center">
                    <img src="images/footer/footlogo1.png" style="width:80px; height:80px;" id="logo1">
                    <span style="margin-left:20px margin-right:20px;">Ápple</span>
                    <img src="images/footer/footlogo.png" id="logo2">
                </div>
                <div id="ourcompany" class="col-md-4 text-md-start text-center">
                    <p>Apple Books</p>
                    <p>경기도 포천시 호국로 1007 (선단동)</p>
                    <p>사업자등록번호 : 101-92-11002</p>
                    <p>대표전화 : 1544-0001(발신자 부담전화)</p>
                    <p>COPYRIGHT(C) <span>APPLE BOOKS</span> ALL RIGHT RESERVED.</p>
                </div>
                <div id="service" class="col-md-4 text-md-start text-center">
                    <p>고객센터 : 02-977-8881</p>
                    <p>고객센터 운영 시간 : 09:00 ~ 20:00</p>
                </div>
            </div>
        </footer>
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
        

        <script>
            <?php
            for($i=0; $i<12; $i++) {
            ?>
            $( document ).ready( function() {
                $( '#card<?= $i ?>' ).mouseenter( function() {
                    $( '#card-header<?= $i ?>' ).css("display", "block");
                    $( '#card-footer<?= $i ?>' ).css("display", "flex");
                }), $( '#card<?= $i ?>' ).mouseleave(function() {
                    $( '#card-header<?= $i ?>, #card-footer<?= $i ?>' ).css("display", "none");
                });
            });
            <?php   }
            ?>
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
    </body>
</html>
