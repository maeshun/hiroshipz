<?php
$splitedData = getLineDataSplitedBySpace(fgets(STDIN));
// この辺の値は不変なので、上書きできないようにconstかdefineしておいたほうが良い
$o_y = $splitedData[0];
$s = $splitedData[1];
$angle = $splitedData[2];

$splitedData = getLineDataSplitedBySpace(fgets(STDIN));
$x = $splitedData[0];
$y = $splitedData[1];
$diameter = $splitedData[2];

define("G", 9.8); // 重力加速度
// deg2radなんてあるんだ！
$tan = tan(deg2rad($angle));
$cos = cos(deg2rad($angle));

// ダーツの着弾点
// 不確定の角度 = θ　←このコメントいる？
// ここの式は関数化するべき
$darts_y = ($o_y + $x * $tan) - (G * pow($x, 2)) / (2 * pow($s, 2) * pow($cos, 2));

// 的の中心からダーツ着弾点までのY座標の距離
// ここは思想をコメントしたほうが良いかな
// 自分のソースはa〜bの場合ヒットのように書いていて、直感的にわかるかと思ったので特にコメントなし
$point_y = $y - $darts_y;
$absPoint_y = abs($point_y);
$radius = $diameter / 2;

// 的の半径以内ならHit。Hitした座標を出力
if ($absPoint_y <= $radius) {
	echo "Hit" . " " . round($absPoint_y, 1);
} else {
	echo "Miss";
}

/**
 * 空白で区切られたデータを配列で返却する
 *
 * @param array $lineData
 */
function getLineDataSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = explode(" ", $lineData);
	return $lineDatas;
}
