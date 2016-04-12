<?php
	$inputNumber = fgets(STDIN);
	//偶数か奇数か判定
	if($inputNumber % 2 === 0) {
		echo "even";
	} else {
		echo "odd";
	}
