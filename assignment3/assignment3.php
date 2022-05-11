<?php
$uname = $_POST['uname'];
$uphone = $_POST['uphone'];
$departure = $_POST['departure'];
$arrival = $_POST['arrival'];
$seattype = $_POST['seattype'];
$seatstobuy = $_POST['seatstobuy'];

$normalseat = array(
"행신-서울" => 8400, "행신-광명" => 8400, "행신-천안아산" => 15600, 
"행신-오송" => 20100, "행신-대전" => 25200, "행신-김천구미" => 36400, "행신-동대구" => 44900,
"행신-신경주" => 50600, "행신-울산" => 54800, "행신-부산" => 61100, 
"서울-광명" => 8400, "서울-천안아산" => 14100,
"서울-오송" => 18500, "서울-대전" => 23700, "서울-김천구미" => 35100, "서울-동대구" => 43500, "서울-신경주" => 49300,
"서울-울산" => 53500, "서울-부산" => 59800,
"광명-천안아산" => 11600, "광명-오송" => 16100, "광명-대전" => 21200, "광명-김천구미" => 32900, "광명-동대구" => 41300,
"광명-신경주" => 47100, "광명-울산" => 51300, "광명-부산" => 57700,
"천안아산-오송" => 8400, "천안아산-대전" => 9600, "천안아산-김천구미" => 21500, "천안아산-동대구" => 29300,
"천안아산-신경주" => 34900, "천안아산-울산" => 40200, "천안아산-부산" => 46500,
"오송-대전" => 8400, "오송-김천구미" => 17000, "오송-동대구" => 24800, "오송-신경주" => 30700,
"오송-울산" => 34800, "오송-부산" => 42200,
"대전-김천구미" => 11900, "대전-동대구" => 19700, "대전-신경주" => 25800, "대전-울산" => 30100, "대전-부산" => 36200,
"김천구미-동대구" => 8400, "김천구미-신경주" => 13800, "김천구미-울산" => 18200, "김천구미-부산" => 24900,
"동대구-신경주" => 8400, "동대구-울산" => 10500, "동대구-부산" => 17100,
"신경주-울산" => 8400, "신경주-부산" => 11000,
"울산-부산" => 8400);

$specialseat = array(
"행신-서울" => 13200, "행신-광명" => 13200, "행신-천안아산" => 21800, 
"행신-오송" => 28100, "행신-대전" => 35300, "행신-김천구미" => 51000, "행신-동대구" => 62900,
"행신-신경주" => 70800, "행신-울산" => 76700, "행신-부산" => 85500, 
"서울-광명" => 13200, "서울-천안아산" => 19700,
"서울-오송" => 25900, "서울-대전" => 33200, "서울-김천구미" => 49100, "서울-동대구" => 60900, "서울-신경주" => 69000,
"서울-울산" => 74900, "서울-부산" => 83700,
"광명-천안아산" => 16400, "광명-오송" => 22500, "광명-대전" => 29700, "광명-김천구미" => 46100, "광명-동대구" => 57800,
"광명-신경주" => 65900, "광명-울산" => 71800, "광명-부산" => 80800,
"천안아산-오송" => 13200, "천안아산-대전" => 14400, "천안아산-김천구미" => 30100, "천안아산-동대구" => 41000,
"천안아산-신경주" => 48900, "천안아산-울산" => 56300, "천안아산-부산" => 65100,
"오송-대전" => 13200, "오송-김천구미" => 23800, "오송-동대구" => 34700, "오송-신경주" => 43000,
"오송-울산" => 48700, "오송-부산" => 59100,
"대전-김천구미" => 16700, "대전-동대구" => 27600, "대전-신경주" => 36100, "대전-울산" => 42100, "대전-부산" => 50700,
"김천구미-동대구" => 13200, "김천구미-신경주" => 19300, "김천구미-울산" => 25500, "김천구미-부산" => 34900,
"동대구-신경주" => 13200, "동대구-울산" => 15300, "동대구-부산" => 23900,
"신경주-울산" => 13200, "신경주-부산" => 15800,
"울산-부산" => 13200);

echo "예약자명 : ".$uname."<br>"."핸드폰 번호 : ".$uphone."<br>"."출발 : ".$departure."<br>"."도착 : ".$arrival."<br>";
if($seattype == "normal") {
	echo "좌석 타입 : ".$seattype."<br>";
	echo "좌석 갯수 : ".$seatstobuy."<br>";
	$cost = $normalseat["$departure-$arrival"];
	if(isset($cost)){
		echo "요금 : ".($cost * $seatstobuy);
	} else {
		echo "선택하신 노선의 KTX가 없습니다";
	}

	
} else {
	echo "좌석 타입 : ".$seattype."<br>";
	echo "좌석 갯수 : ".$seatstobuy."<br>";
	$cost = $specialseat["$departure-$arrival"];
	if(isset($cost)){
		echo "요금 : ".($cost * $seatstobuy);
	} else {
		echo "선택하신 노선의 KTX가 없습니다";
	}
	
}



?>