<?php
// get〜メソッドはそのメソッド内でもtrimしているので、ここでのtrimは不要
$construction = getLineDatasSplitedBySpace((fgets(STDIN)));//[工事現場のx座標, 工事現場のy座標, 工事現場の騒音の届く距離]
$shadeNum = trim(fgets(STDIN));//木陰の数

for ($i = 0; $i < $shadeNum; $i++) {
	$shadeSites[] = getLineDatasSplitedBySpace(trim(fgets(STDIN)));//[木陰のx座標, 木陰のy座標]
}

//木陰ごとに騒音の届く距離から離れているか判定
foreach ($shadeSites as $shadeSite) {
	if (diffBetweenArea($shadeSite, $construction) >= pow($construction[2], 2)) {
		echo "silent";
	} else {
		echo "noisy";
	}
	echo "\n";
}

//工事現場と木陰の距離の差を求める
function diffBetweenArea($shadeSite, $construction) {
	//引数を渡していなかったので、nullになっていた。PHPは関数内でグローバル変数を参照しない
	$a = pow(($shadeSite[0] - $construction[0]), 2);
	$b = pow(($shadeSite[1] - $construction[1]), 2);
	$diff = $a + $b;
	return $diff;
}

//空白で区切られたデータを配列で返却する
function getLineDatasSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = explode(" ", $lineData);
	return $lineDatas;
}
