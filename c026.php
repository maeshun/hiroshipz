<?php
$inputLines = getLineDataSplitedByDelimiter(fgets(STDIN), " ");

$carrotCount = $inputLines[0];
$baseValue = $inputLines[1];
$tolerance = $inputLines[2];
$minValue = $baseValue - $tolerance; // 最低許容値
$maxValue = $baseValue + $tolerance; // 最高許容値

$numOfCarrot = 0; // 人参の番号
$heaviestCarrot = 0; // 一番重い人参

// 糖分が許容値範囲内かつ一番重い人参を選出する
for ($i = 0; $i < $carrotCount; $i++) {
	$numOfCarrot++;
	$carrotData = getLineDataSplitedByDelimiter(fgets(STDIN), " ");

	$weght = $carrotData[0];
	$sugar = $carrotData[1];

	if ($minValue <= $sugar && $sugar <=  $maxValue) {
		if ($heaviestCarrot < $weght) {
			$heaviestCarrot = $weght;
			$selectedCarrotNum = $numOfCarrot;
		}
	}
}

if (empty($selectedCarrotNum)) {
	echo "not found";
} else {
	echo $selectedCarrotNum;
}


/**
 * 区切り文字を使ってデータを配列で返却する
 *
 * @param string $lineData 元データ
 * @return array $lineData 配列に変換したデータ
 */
function getLineDataSplitedByDelimiter($lineData, $delimiter) {
	$lineData = trim($lineData);
	$lineDatas = explode($delimiter, $lineData);
	return $lineDatas;
}
