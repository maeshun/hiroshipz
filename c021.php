<?php
$typhoonInfo = getLineDatasSplitedBySpace(fgets(STDIN));//台風情報
$radius_1 = $typhoonInfo[2];//円xの半径
$radius_2 = $typhoonInfo[3];//円yの半径

$peoples = trim(fgets(STDIN));//人数

//暴風域にいるか判定する
for ($i = 0; $i < $peoples; $i++) {
	$coordinates = getLineDatasSplitedBySpace(fgets(STDIN));//人の座標
	$range = diffBetweenCoordinates($typhoonInfo, $coordinates);

	if ($range >= pow($radius_1, 2) && $range <= pow($radius_2, 2)) {
		echo "yes";
	} else {
		echo "no";
	}
	echo "\n";
}

//座標の差を求める
function diffBetweenCoordinates($typhoonInfo, $coordinates) {
	$center_X = $typhoonInfo[0];//円xの中心座標
	$center_y = $typhoonInfo[1];//円yの中心座標
	$x = $coordinates[0];//人のx座標
	$y = $coordinates[1];//人のy座標

	$range = pow(($x - $center_X), 2) + pow(($y - $center_y), 2);
	return $range;
}

//空白で区切られたデータを配列で返却する
function getLineDatasSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = split(" ", $lineData);
	return $lineDatas;
}
