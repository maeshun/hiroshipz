<?php

define("WEEK", 7);
$workDayCount = 0;

for ($i = 0; $i < WEEK; $i++) {
	$inputLine = trim(fgets(STDIN));

	if ($inputLine === "no") {
		$workDayCount++;
	}
}

echo $workDayCount;
