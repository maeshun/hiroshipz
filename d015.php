<?php
	$inputNumber = fgets(STDIN);
	//$inputNumberから１までカウントダウン
	for($i = 0; $i < $inputNumber; $i++) {
		echo $inputNumber - $i ."\n";
	}
