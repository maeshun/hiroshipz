<?php
$canCarryPaper = trim(fgets(STDIN)); // 運べる枚数
$faxCount = trim(fgets(STDIN)); // FAXが届く回数

$totalCarryCount = 0; // 運ぶ合計回数
$preHour = 0; // 1つ前の時間
$totalNumOfPapers = []; // 合計枚数
$count = 0;

// 1時間毎の合計枚数を保持した配列を作成
for ($i = 0; $i < $faxCount; $i++) {
	$faxData[] = getLineDataSplitedByDelimiter(fgets(STDIN), " ");
	$hour = $faxData[$i][0];
	$numOfPapers = $faxData[$i][2];

	if ($preHour < $hour) {
		$preHour = $hour;
		$count++;
	}

	if ($preHour == $hour) {
		$totalNumOfPapers[$count] += $numOfPapers;
	}
}

// 1時間ごとに運ぶ回数を計算し、合計で運ぶ回数を出力
foreach ($totalNumOfPapers as $papersAnHour) {

	$totalCarryCount += ceil($papersAnHour / $canCarryPaper);
}

echo $totalCarryCount;




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
