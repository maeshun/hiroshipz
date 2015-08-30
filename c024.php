<?php
//処理の数
$numberOfProcess = trim(fgets(STDIN));

$val1 = 0;
$val2 = 0;

for ($i = 0; $i < $numberOfProcess; $i++) {
	$inputValues = getLineDatasSplitedBySpace(fgets(STDIN));
	$process = $inputValues[0];
	//$processの入力値に応じて処理を実行
	if (preg_match("/SET/", $process)) {
		if ($inputValues[1] == 1) {
			$val1 = $inputValues[2];
		} else {
			$val2 = $inputValues[2];
		}
	} elseif (preg_match("/ADD/", $process)) {
		$val2 = addVal($val1, $inputValues[1]);
	} else {
		$val2 = subVal($val1, $inputValues[1]);
	}
}

echo $val1 . " " . $val2;

//「変数 1 の値 + a」を計算し、計算結果を変数 2 に代入する
function addVal ($val, $int) {
	$val2 = $val + $int;
	return $val2;
}
//「変数 1 の値 - a」を計算し、計算結果を変数 2 に代入する
function subVal ($val, $int) {
	$val2 = $val - $int;
	return $val2;
}

//空白で区切られたデータを配列で返却する
function getLineDatasSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = split(" ", $lineData);
	return $lineDatas;
}
