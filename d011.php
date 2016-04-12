<?php
	$inputLine = trim(fgets(STDIN));
	$alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	//入力した値がアルファベットの何番目か出力
	$position = strpos($alphabet, $inputLine) + 1;
	echo $position;
