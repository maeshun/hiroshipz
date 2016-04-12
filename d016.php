<?php
		$inputLine = fgets(STDIN);
		$maxCount = fgets(STDIN);
		//$maxCountまでテキストを出力
		for ($i = 0; $i < $maxCount; $i++) {
			echo $inputLine[$i];
		}
