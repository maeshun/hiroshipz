<?php
define("BOX_HEIGHT"	, 0);
define("BOX_WIDTH"	, 1);
define("BOX_DEPTH"	, 2);

$splitedData = getLineDatasSplitedBySpace(fgets(STDIN));

// 箱の個数
$boxCount	= $splitedData[0];
// ボールの半径
$ballRadius	= $splitedData[1];
$diameter = $ballRadius * 2;

for ($i = 1; $i <= $boxCount; $i++) {
	$boxDetail = getLineDatasSplitedBySpace(fgets(STDIN));
	// 箱の縦、横、高さがボールの直径より大きいとき、番号を出力
	if ($boxDetail[BOX_HEIGHT] >= $diameter
		and $boxDetail[BOX_WIDTH] >= $diameter
		and $boxDetail[BOX_DEPTH] >= $diameter) {
		echo $i . "\n";
	}
}

/**
 * 空白で区切られたデータを配列で返却する
 *
 */
function getLineDatasSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = split(" ", $lineData);
	return $lineDatas;
}

?>