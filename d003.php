<?php
	$input_lines = fgets(STDIN);
	define('MAX' , 10);

	for ($i = 1; $i < MAX; $i++) {
		$answer[] = $input_lines * $i;
	}
	$multiple = implode(" " , $answer);
	echo $multiple;
