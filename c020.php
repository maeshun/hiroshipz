<?php
$stocks = getLineDatasSplitedBySpace(trim(fgets(STDIN)));

for ($i = 1; $i < count($stocks); $i++) {
	$stocks[$i] = percentToFew($stocks[$i]);
}

//売れ残った量を出力
$unsold = $stocks[0] - ($stocks[0] * $stocks[1]);
$unsold = $unsold - ($unsold * $stocks[2]);
echo $unsold;

//％を少数に変換
function percentToFew($num) {
	$percent = $num / 100;
	return($percent);
}

//空白で区切られたデータを配列で返却する
function getLineDatasSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = split(" ", $lineData);
	return $lineDatas;
}
