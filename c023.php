<?php
// winningNumber・・・strikeかhitじゃね？
// あと配列なのでNumbersにするべき
$winningNumber = getLineDatasSplitedBySpace(fgets(STDIN));//当選番号
$tickets = trim(fgets(STDIN));//チケットの枚数

//当選番号とチケット番号の比較
for ($i = 0; $i < $tickets; $i++) {
	// 代入する変数が配列になっている理由はなんで？
	$ticket[$i] = getLineDatasSplitedBySpace(fgets(STDIN));
	// ◆課題
	// array_intersectを使わないで解く
	$matchNums[] = array_intersect($winningNumber, $ticket[$i]);

	// この辺でcountをechoすりゃ良くね？
	// わざわざ下のほうでループさせる分処理がムダ
}

//マッチした数の出力
foreach ($matchNums as $matchNum) {
	echo count($matchNum) . "\n";
}

//空白で区切られたデータを配列で返却する
function getLineDatasSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = split(" ", $lineData);
	return $lineDatas;
}
