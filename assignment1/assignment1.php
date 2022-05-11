<h1>과제 1</h1>

<?php
$set= [];
for($i=0; $i<10; $i++){
	for($k=0; $k<6; $k++){
		$number[$k] = mt_rand(1,45);
		for($j=0; $j<$k; $j++){
			if($number[$k] == $number[$j]) {
				$number[$k] = mt_rand(1,45);
				$j=0;
			}
		}
	}
	$set[$i] = $number;
}

echo "<h3>과제 1.1) 결과</h3>";

for($i=0; $i<10; $i++){
	echo "$i 번째 세트 번호 : ";
	for($k=0; $k<6; $k++){
		echo $set[$i][$k].", ";
	}
	echo "<br>";
}

echo "<h3>과제 1.2) 결과</h3>";

$freq = [];

for($j=0; $j<45; $j++){
	$freq[$j]=0;
}

for($i=0; $i<10; $i++){
	for($k=0; $k<6; $k++){
		$freq[$set[$i][$k] - 1]++;
	}
}


for($k=0; $k<45; $k++){
	echo ($k + 1)." 의 갯수 : ".$freq[$k]."<br>";
}

echo "<h3>과제 1.3) 결과</h3>";

$max = 0;
for($i=0; $i<45; $i++){
	if($freq[$i] > $max){
		$max = $freq[$i];
	}
}

for($k=$max; $k>=0; $k--){
	for($j=0; $j<45; $j++){
		if($freq[$j] == $k){
			echo ($j+1)." 의 갯수 : ".$freq[$j]."<br>";
		}
	}
}

?>