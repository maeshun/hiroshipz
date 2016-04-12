<?php

$sectionTimes = getLineDataSplitedByDelimiter(fgets(STDIN), " ");
$houseToStA = $sectionTimes[0]; // 家から駅Aまでの時間
$stAtoStB = $sectionTimes[1]; // 駅Aから駅Bまでの時間
$stBtoOffice = $sectionTimes[2]; // 駅Bから会社までの時間

define('TIMEREMIT', 540);

$linesOfStA = trim(fgets(STDIN));
$timeTable_stA = []; // StAの時刻表

for ($i = 0; $i < $linesOfStA; $i++) {
	$inputLine = getLineDataSplitedByDelimiter(fgets(STDIN), " ");
	// 分に変換した時刻を時刻表配列に格納
	$timeTable_stA[$i] = ($inputLine[0] * 60) + $inputLine[1];
}

// 時刻表配列の中から、オフィスに間に合う最遅出発時刻を抽出
$timeRemit_stA = TIMEREMIT - $stBtoOffice - $stAtoStB;
for ($i = (count($timeTable_stA) - 1); $i >= 0; $i--) {
	if ($timeTable_stA[$i] < $timeRemit_stA) {
		$latestTime_stA = $timeTable_stA[$i];
		break;
	}
}

// 最遅の出発時刻を出力
$latestLeaveTime = $latestTime_stA - $houseToStA;
$hour = (int)($latestLeaveTime / 60);
$min = $latestLeaveTime % 60;

echo fillZero($hour) . ":" . fillZero($min);


/// 10未満の数字を0埋めする
function fillZero($num) {
	if ($num < 10) {
		return (0 . $num);
	} else {
		return $num;
	}
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
