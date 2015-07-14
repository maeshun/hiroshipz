<?php
	$inputNumber = fgets(STDIN);
	if ($inputNumber < 0) {
		$inputNumber = $inputNumber * (-1);
	}
	echo $inputNumber;
