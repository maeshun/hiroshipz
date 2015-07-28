<?php
$splitedData = getLineDatasSplitedBySpace(fgets(STDIN));

$devidedNum = $splitedData[0];
$devideNum = $splitedData[1];

echo (int)($devidedNum / $devideNum) . " " . ($devidedNum % $devideNum);

//空白で区切られたデータを配列で返却する
function getLineDatasSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = split(" ", $lineData);
	return $lineDatas;
}
