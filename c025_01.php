<?php
$deliveablePaper = trim(fgets(STDIN)); // 運べる枚数
$faxCount = trim(fgets(STDIN)); // FAXが届く回数

// 1時間毎の合計枚数を保持した配列を作成
define('HOUR', 0);
define('FAXNUM', 2);
for ($i = 0; $i < $faxCount; $i++) {
	$tmp_faxData = getLineDataSplitedByDelimiter(fgets(STDIN), " ");
	$faxDataPerHour[$tmp_faxData[HOUR]] += $tmp_faxData[FAXNUM];
}

// 1時間ごとに運ぶ回数を計算し、運ぶ合計回数を出力
$totalDeliverTimes = 0; // 運ぶ合計回数
foreach ($faxDataPerHour as $faxData) {

	$totalDeliverTimes += ceil($faxData / $deliveablePaper);
}

echo $totalDeliverTimes;


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
