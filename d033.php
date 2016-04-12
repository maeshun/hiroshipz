<?php
$inputLines = getLineDataSplitedByDelimiter(fgets(STDIN), ' ');

$lastName = substr($inputLines[0], 0, 1);
$firstName = substr($inputLines[1], 0, 1);

echo $lastName . "." . $firstName;

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
