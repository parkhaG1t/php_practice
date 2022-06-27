
<!DOCTYPE html>
<html>
<head>
    <title>회원정보수정</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    * {
        box-sizing: border-box;
      }
      body {
        height: 100vh;
        background-image: url("../images/signupbg.jpg");
        background-size: cover;
        background-repeat: no-repeat;
      }
      .container {
        border-radius: 5px;
        padding: 20px;
        background-color: whitesmoke;
        opacity: 0.9;
        position: fixed;
        width: 600px;
        height: 500px;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
      }
      h2 {
        font-family: "Helvetica Nene", Helvetica, Arial, sans-serif;
        position: absolute;
        left: 30px;
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
      input[type="date"],
      select,
      textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
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
      button {
        background-color: red;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
        float: right;
        margin-left: 5px;
      }
      button:hover {
        background-color: darkred;
      }
    </style>
    </head>
    <body>
		<?php
    session_start();
    $logged = false;
    if(isset($_SESSION['uid'])) { 
        $uid = $_SESSION['uid'];
        $uname = $_SESSION['uname'];
        $logged = true;
    }
		# 로그인한 사용자의 회원정보를 읽어와서 아래 입력 양식에 표시하기
    if(!$logged) {
      echo "<script>alert('로그인 후 사용해주세요 '$logged''); location.href='signup.html';</script>";
    }
		$uid = $_SESSION['uid'];	// 로그인한 사용자의 아이디
		include_once('../connect.php');
		$sql = "select * from user where id = '$uid'";
		$result = $conn->query($sql);
		if(isset($result) && $result->num_rows > 0) {
			$row = $result->fetch_assoc();	// 검색된 레코드 하나가 연관배열로 $row 에 저장
		?>
    <div class="container">
      <div class="header">
        <h2>Modify</h2>
        <div class="logo">
          <a href="../index.php"
            ><img
              src="../images/logo1.png"
              style="width: 40px; height: 40px" />Ápple
            <img
              src="../images/logo2.png"
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
        
          <form action="signmodproc.php" method="post">
            <div class="row">
              <div class="col-25">
                <label for="fname">이메일</label>
              </div>
              <div class="col-75">
                <input type="text" name="email" value="<?=$row['email']?>" readonly>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">아이디</label>
              </div>
              <div class="col-75">
                <input type="text" name="uid" value="<?=$row['id']?>" readonly>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">이름</label>
              </div>
              <div class="col-75">
                <input type="text" name="uname" value="<?=$row['name']?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">비밀번호</label>
              </div>
              <div class="col-75">
                <input type="text" name="pwd" value="<?=$row['pwd']?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">전화번호</label>
              </div>
              <div class="col-75">
                <input type="text" name="telno" value="<?=$row['phone']?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">배송지</label>
              </div>
              <div class="col-75">
                <input type="text" name="loc" value="<?=$row['loc']?>" >
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">생년월일</label>
              </div>
              <div class="col-75">
                <input type="date" name="birth" value="<?=$row['birth']?>" readonly>
              </div>
            </div>
            <div class="row">
              <button type="button" onclick="location.href='signdel.php';">Withdrawal</button>
              <input type="submit" value="Submit">
            </div>
            
          </form>
        </div>
			</div>
		<?php } ?>
		
    </body>
</html>