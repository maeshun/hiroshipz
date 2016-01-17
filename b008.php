<?php
$splitedData = getLineDataSplitedBySpace(fgets(STDIN));
$membership = $splitedData[0]; // 会員数
$numOfLives = $splitedData[1]; // ライブ数
$maximumAnnualSales = 0; // 年間最高売上

for ($i = 0; $i < $numOfLives; $i++) {

	$sales = getLineDataSplitedBySpace(fgets(STDIN));	// ライブ1回の売上データ配列
	$sale = 0; // 1人あたりの売上
	$totalSalesPerLive = 0; // ライブ1回の総売上

	// ライブ1回の総売上を算出
	foreach ($sales as $sale) {
		$totalSalesPerLive += $sale;
	}

	// 総売上が0以上の場合、年間売上に加算
	if ($totalSalesPerLive >= 0) {
		$maximumAnnualSales += $totalSalesPerLive;
	}
}

echo $maximumAnnualSales;

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
