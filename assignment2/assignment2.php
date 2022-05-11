<?php
$uid = $_POST['uid'];
$uphone = $_POST['uphone'];
$upickup = ($_POST['upickup']);
$ureturn = ($_POST['ureturn']);
$ucars = $_POST['ucars'];
if(isset($_POST['acc'])) {
	$acc = $_POST['acc'];
}



$day = abs(strtotime($upickup) - strtotime($ureturn))/(60*60*24);
$cost = 0;

switch($ucars){
	case "k3" : $cost += 21500*$day; break;
	case "k5" : $cost += 28500*$day; break;
	case "k8" : $cost += 35600*$day; break;
	case "쏘나타" : $cost += 29700*$day; break;
	case "투싼" : $cost += 30500*$day; break;
	case "그랜저" : $cost += 33400*$day; break;
}


if(isset($acc)){
	for($i=0; $i<count($acc); $i++){
		switch($acc[$i]){
			case "blackbox" : $cost += 1100*$day; break;
			case "insurance" : $cost += 4500*$day; break;
			case "stroller" : $cost += 1700*$day; break;
			case "camping" : $cost += 7200*$day; break;
			case "icebox" : $cost += 1100; break;
		}
	}
}



echo "Name : $uid<br>";
echo "Phone : $uphone<br>";
echo "Pick-up Date : $upickup<br>";
echo "Return Date : $ureturn<br>";
echo "Car : $ucars<br>";
echo "Accessories : <br>";
if(isset($acc)){
	for($i=0; $i<count($acc); $i++){
		echo "- $acc[$i]<br>";
	}
} else {
	echo "- None<br>";
}
echo "Cost : $cost<br>";

?>