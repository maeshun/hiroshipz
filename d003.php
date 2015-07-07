<?php
	$input_lines = fgets(STDIN);
	//$number = array();

	for ($i=1; $i < 10 ; $i++) {
		$number[] = $input_lines * $i;
	}
	$multiple = implode(" " , $number);
	echo "$multiple";
