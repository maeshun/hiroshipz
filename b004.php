<?php

$ipPatterns = getLineDataSplitedByDelimiter(fgets(STDIN), ".");

// [min - max]の表示を正規表現に変換できずこの解答
$lineCount = trim(fgets(STDIN));

for ($i = 0; $i < $lineCount; $i++) {

	$log = getLineDataSplitedByDelimiter(fgets(STDIN), " ");
	$ips = getLineDataSplitedByDelimiter($log[0], ".");

	// 指定したIPアドレスの範囲内のログデータのみ整形して出力する
	if (checkIpRange($ipPatterns, $ips)) {
		$ip = $log[0];
		$tmpTime = $log[3];
		$time = preg_replace("/\[/", "", $tmpTime);
		$url = $log[6];
		$formatedLog = [$ip, $time, $url];
		echo implode(" ", $formatedLog);
		echo "\n";
	}
}


/**
 * IPアドレスが指定したIPアドレスパターンの範囲内か判定する
 *
 * @param array $ipPatterns IPアドレスパターン
 * @param array $ips IPアドレスをオクテットごとに分割した配列
 * @return bool
 */
function checkIpRange($ipPatterns, $ips) {
	for ($i = 0; $i < count($ipPatterns); $i++) {

		if (preg_match('/\*/', $ipPatterns[$i])) {
			continue;

		} elseif (preg_match('/(\d+)-(\d+)/', $ipPatterns[$i], $match)) {
			$min = $match[1];
			$max = $match[2];

			if ($min <= $ips[$i] && $ips[$i] <= $max) {
				continue;
			} else {
				return false;
			}

		} elseif ($ipPatterns[$i] == $ips[$i]) {
			continue;

		} else {
			return false;
		}
	}

	return true;
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
