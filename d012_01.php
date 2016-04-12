<?php
	$inputNumber = fgets(STDIN);
	//-の値が入力された場合＋にする
	if ($inputNumber < 0) {
		$inputNumber = $inputNumber * (-1);
	}
	echo $inputNumber;
