<?php
	$inputLine = trim(fgets(STDIN));
	$inputLine = explode(" ", $inputLine);
	//商と余りの出力
	echo floor($inputLine[0] / $inputLine[1]);//小数点以下の切り捨て
	echo " " . ($inputLine[0] % $inputLine[1]);
