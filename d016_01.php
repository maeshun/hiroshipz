<?php
	$inputLine = fgets(STDIN);
	$maxCount = fgets(STDIN);
	//$maxCountまでテキストを出力
	substr($inputLine, 0, $maxCount);
