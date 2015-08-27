<?php
$numberOfReceipts = trim(fgets(STDIN));//レシート枚数
$point = 0;

//ポイント数の合計を求める
for ($i = 0; $i < $numberOfReceipts; $i++) {
	// trimはget〜関数内で処理してるため不要
	// これがなかったらLGTMだったのに・・・
	$receipt = getLineDatasSplitedBySpace((fgets(STDIN)));
	$date = $receipt[0];//日付
	$price = $receipt[1];//購入金額
	//日付によって還元率を出し分け
	if (strstr($date, '3')) {
		$point += floor($price * 0.03);
	} elseif (strstr($date, '5')) {
		$point += floor($price * 0.05);
	} else {
		$point += floor($price * 0.01);
	}
}

echo $point;

//空白で区切られたデータを配列で返却する
function getLineDatasSplitedBySpace($lineData) {
	$lineDatas = explode(" ", $lineData);
	return $lineDatas;
}
