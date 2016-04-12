<?php
$inputLines = trim(fgets(STDIN));//合計の日数（7の倍数）
define("week", 7);

//曜日ごとの合計を求める
for ($i = 0; $i < $inputLines; $i++) {
	$sales[$i % week] += (int)trim(fgets(STDIN));//7で割りつつ、合計値を代入
}
//合計の出力
foreach ($sales as $sale) {
	echo $sale . "\n";
}
