<?php
	$num = fgets(STDIN);
	if ($num < 0) {
		echo -$num;
	} else {
		echo $num;
	}
