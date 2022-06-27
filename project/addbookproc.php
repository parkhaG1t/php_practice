<?php
#0. 세션 처리 시작하기
session_start();	// 이 페이지에 대해서 세션 데이터 처리하고자 한다.
#1. DB 접속
include_once('connect.php');
#2. 폼 데이터 읽어오기
$title = $_POST['title'];
$author = $_POST['author'];
$price = $_POST['price'];
$intro = $_POST['intro'];

$sql = "select * from books where title = '$title'";
$result = $conn->query($sql);
if(isset($result) && $result->num_rows != 0) {
	die("<script>alert('이미 등록된 책입니다'); location.href='addbook.php';</script>");
}


// 임시로 저장된 정보(tmp_name)
$tempFile = $_FILES['imgFile']['tmp_name'];

// 파일타입 및 확장자 체크
$fileTypeExt = explode("/", $_FILES['imgFile']['type']);

// 파일 타입 
$fileType = $fileTypeExt[0];

// 파일 확장자
$fileExt = $fileTypeExt[1];

// 확장자 검사
$extStatus = false;

switch($fileExt){
	case 'jpeg':
	case 'jpg':
	case 'gif':
	case 'bmp':
	case 'png':
		$extStatus = true;
		break;
	
	default:
		echo "이미지 전용 확장자(jpg, bmp, gif, png)외에는 사용이 불가합니다."; 
		exit;
		break;
}

// 이미지 파일이 맞는지 검사. 
if($fileType == 'image'){
	// 허용할 확장자를 jpg, bmp, gif, png로 정함, 그 외에는 업로드 불가
	if($extStatus){
		// 임시 파일 옮길 디렉토리 및 파일명

        $fileName = "$title"."_"."$author"."."."$fileExt";

		$resFile = "images/books/".$fileName;
		// 임시 저장된 파일을 우리가 저장할 디렉토리 및 파일명으로 옮김
		$imageUpload = move_uploaded_file($tempFile, $resFile);
		
		// 업로드 성공 여부 확인
		if($imageUpload == false){
			echo "<script>alert('파일 업로드에 실패하였습니다.');</script>";
		}
	}	// end if - extStatus
		// 확장자가 jpg, bmp, gif, png가 아닌 경우 else문 실행
	else {
		echo "<script>alert('이미지 전용 확장자(jpg, bmp, gif, png)외에는 사용이 불가합니다.');</script>";
		exit;
	}	
}	// end if - filetype
	// 파일 타입이 image가 아닌 경우 
else {
	echo "<script>alert('이미지 파일이 아닙니다.');</script>";
	exit;
}

#3. SELECT SQL 작성
$sql = "insert into books(title, author, price, imgname, intro) values('$title', '$author', $price, '$fileName', '$intro')";
#4. SQL 실행
if($conn->query($sql)) {
    echo "<script>alert('책 추가 성공!'); location.href = 'index.php';</script>";
} else {
    echo "<script>alert('책 추가 중 오류 발생'); location.href = 'index.php';</script>";
}
?>