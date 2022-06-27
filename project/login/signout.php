<?php
# 로그아웃은 세션 데이터 삭제하고 메인페이지로 이동하기
session_start();
session_destroy();	// 세션 데이터(uid, uname) 삭제한다.
echo "<script>history.back()</script>"; 	// 자바스크립트 구문. 바로 전 페이지로 이동하기.
?>