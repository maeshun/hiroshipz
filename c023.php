<?php
$winningNumber = getLineDatasSplitedBySpace(fgets(STDIN));//当選番号
$tickets = trim(fgets(STDIN));//チケットの枚数

//当選番号とチケット番号の比較
for ($i = 0; $i < $tickets; $i++) {
	$ticket[$i] = getLineDatasSplitedBySpace(fgets(STDIN));
	$matchNums[] = array_intersect($winningNumber, $ticket[$i]);
}

//マッチした数の出力
foreach ($matchNums as $matchNum) {
	echo count($matchNum) . "\n";
}

//空白で区切られたデータを配列で返却する
function getLineDatasSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = split(" ", $lineData);
	return $lineDatas;
}
