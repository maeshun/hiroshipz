<?php
// can〜はイケてない。〜ableにしよう。
$canCarryPaper = trim(fgets(STDIN)); // 運べる枚数
$faxCount = trim(fgets(STDIN)); // FAXが届く回数

$totalCarryCount = 0; // 運ぶ合計回数
$preHour = 0; // 1つ前の時間
$totalNumOfPapers = []; // 合計枚数
$count = 0;

// 1時間毎の合計枚数を保持した配列を作成
for ($i = 0; $i < $faxCount; $i++) {
	// ここで$faxDataを溜め込む理由ってなに？
	// ループの外で利用していないので上書きで良いのでは？
	$faxData[] = getLineDataSplitedByDelimiter(fgets(STDIN), " ");
	$hour = $faxData[$i][0];
	$numOfPapers = $faxData[$i][2];

	// ここから下の7行が冗長
	// この1行で解決する
	// $totalNumOfPapers[$faxData[$i][0]] += $numOfPapers;
	if ($preHour < $hour) {
		$preHour = $hour;
		$count++;
	}

	// 上のifがあるんだから、ここは必ず通るんだよね？
	// 無駄判定
	if ($preHour == $hour) {
		// totalNumOfPapersっていう変数名だと、単純に枚数のみが格納されているように見える
		$totalNumOfPapers[$count] += $numOfPapers;
	}

}

// 1時間ごとに運ぶ回数を計算し、合計で運ぶ回数を出力
foreach ($totalNumOfPapers as $papersAnHour) {
	// papersAnHourって変数名がイケてない
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
