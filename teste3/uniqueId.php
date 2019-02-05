<?php
$prefix = "PT";
$uniqid = $prefix . uniqid();
echo $uniqid;
for($i = 0; $i<100; $i++){
	$uniqid = $prefix . uniqid();
	echo $uniqid."</br>";
}

