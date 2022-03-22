<?php
echo "<h1>test page</h1>";
$sum = 0;
for($i=0;$i<10;$i++){
    $sum += mt_rand(1, 100);
}
?>
<h3 style="color:orange;">sum 10 random numbers from 1 to 100</h3>
<h3><?=$sum?></h3>