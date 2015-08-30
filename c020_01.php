<?php
$spilitedData = getLineDataSplitedBySpace(fgets(STDIN));

// 仕入れた重量
$purchase		= $spilitedData[0];
// 生で売れたパーセント
$soldRaw		= $spilitedData[1];
// 加工して売れたパーセント
$soldProcessed	= $spilitedData[2];

$remains = $purchase * percentToNumeric(100 - $soldRaw);
$remains = $remains * percentToNumeric(100 - $soldProcessed);

echo $remains;

// パーセントを少数で返す
function percentToNumeric($percent) {
	return $percent / 100;
}

/**
 * 空白で区切られたデータを配列で返却する
 *
 */
function getLineDataSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = split(" ", $lineData);
	return $lineDatas;
}


?>