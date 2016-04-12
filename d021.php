<?php
	$inputLines1 = fgets(STDIN);
	$inputLines2 = fgets(STDIN);

	if($inputLines1 === $inputLines2) {
		echo "Yes";
	} else {
		echo "No";
	}
