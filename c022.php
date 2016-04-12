<?php
$period = trim(fgets(STDIN));//期間
//始値, 終値, 高値, 安値
$keys = array(start, end, high, low);

for ($i = 0; $i < $period; $i++) {
	$stockPrice = getLineDatasSplitedBySpace(fgets(STDIN));
	$stockPrices[$i] = array_combine($keys, $stockPrice);
}

//期間中の始値と終値を出力
echo $stockPrices[0][start] . " ";//始値
echo $stockPrices[$period - 1][end] . " ";//終値

//期間中の高値と安値を出力
foreach ($stockPrices as $stockPrice) {
	$daylyHighPrices[] = max($stockPrice);
	$daylyLowPrices[] = min($stockPrice);
}
echo max($daylyHighPrices) . " ";
echo min($daylyLowPrices);

//空白で区切られたデータを配列で返却する
function getLineDatasSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = split(" ", $lineData);
	return $lineDatas;
}
