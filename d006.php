<?php
	$inputLine = trim(fgets(STDIN));
	$inputLine = explode(" ", $inputLine);
	$distance = $inputLine[0];
	$unit = $inputLine[1];
	//距離をmmに換算
	switch ($unit) {
		case "km":
			echo $distance * 1000 * 100 * 10;
			break;
		case "m":
			echo $distance * 100 * 10;
			break;
		case "cm":
			echo $distance * 10;
			break;
	}
