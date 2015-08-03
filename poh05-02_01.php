<?php
define("DAY_OF_WEEK", 7);

$daysCount = trim(fgets(STDIN));

//曜日ごとの合計を求める
$sumOfDay = array();
for ($i = 0; $i < $daysCount; $i++) {
	if (($i / DAY_OF_WEEK) === 0) {
		$sumOfDay[$i] = 0;//そのままだと、$sumOfDayがNULLなので、初期化している
	}
	$sumOfDay[$i % DAY_OF_WEEK] += (int)trim(fgets(STDIN));
}

//合計の出力
foreach ($sumOfDay as $sum) {
	echo $sum . "\n";
}
