<?php
	$inputLine = fgets(STDIN);
	$inputLine = explode(" ", $inputLine);
	// 等差数列の出力
	$syokou = $inputLine[0];
	echo $syokou;
	for ($i = 0; $i < 9; $i++) {
		$syokou += $inputLine[1];	//$syokou = $syokou + $inputLine[1];　と同義
		echo " " . $syokou;
	}
