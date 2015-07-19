<?php
	$inputNumber = fgets(STDIN);
	// コメント入れてみよう
	if ($inputNumber < 0) {
		$inputNumber = $inputNumber * (-1);
	}
	echo $inputNumber;
