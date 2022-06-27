<!-- SESSION START -->
<?php
  session_start();
  $logged = false;
  if(isset($_SESSION['uid'])) { 
      $uid = $_SESSION['uid'];
      $uname = $_SESSION['uname'];
      $logged = true;
  }
  // 관리자 확인
  if(!($uid === 'admin')) {
    die("<script>alert('관리자만 접근할 수 있는 페이지입니다.'); location.href = 'index.php';</script>");
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>AddBook</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
      * {
        box-sizing: border-box;
      }
      body {
        height: 100vh;
        background-image: url("images/addbookbg.jpg");
        background-size: cover;
        background-repeat: no-repeat;
      }
      .container {
        position:relative;
        border-radius: 5px;
        padding: 20px;
        background-color: gray;
        opacity: 0.9;
        width: 70%;
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
      .col-75 {
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
        <h2>AddBook</h2>
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

      <form action="addbookproc.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-25">
            <label for="fname">책 이름</label>
          </div>
          <div class="col-75">
            <input type="text" name="title" placeholder="Book Title.." />
          </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="fname">저자</label>
          </div>
          <div class="col-75">
            <input type="text" name="author" placeholder="Author.." />
          </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="fname">설명</label>
          </div>
          <div class="col-75">
            <input type="text" name="intro" placeholder="Intro.." />
          </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="fname">가격</label>
          </div>
          <div class="col-75">
            <input type="number" name="price" placeholder="Price.." />
          </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="fname">이미지</label>
          </div>
          <div class="col-75">
            <input type="file" name="imgFile"/>
          </div>
        </div>

        <div class="row">
          <input type="submit" value="Submit" />
        </div>
      </form>
    </div>
  </body>
</html>
