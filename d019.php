<?php
	//空白区切り文字を配列に変換
	$inputLine = trim(fgets(STDIN));
	$inputLine = explode(" ", $inputLine);
	//$n番目の文字列を出力
	$text = $inputLine[0];
	$n = (int)$inputLine[1] - 1;
	echo $text[$n];
