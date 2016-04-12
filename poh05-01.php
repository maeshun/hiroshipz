<?php
	$input_lines = trim(fgets(STDIN));
	for ($i = 0; $i < strlen($input_lines); $i++) {
		if ($i % 2 === 0) {
			echo $input_lines[$i];
		}
	}
