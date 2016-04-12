<?php
// winningNumber・・・strikeかhitじゃね？
// あと配列なのでNumbersにするべき
$hitNums = getLineDatasSplitedBySpace(fgets(STDIN));//当選番号
$tickets = trim(fgets(STDIN));//チケットの枚数
$matchNums = [];

//当選番号とチケット番号の比較
for ($i = 0; $i < $tickets; $i++) {
	// 代入する変数が配列になっている理由はなんで？
	// ループのたびに合っている数を出力するのではなく、一旦溜めて最後に出力するからです
	$ticketNums = getLineDatasSplitedBySpace(fgets(STDIN));
	// ◆課題
	// array_intersectを使わないで解く
	for ($j = 0; $j < count($ticketNums); $j++) {
		for ($k = 0; $k < 6; $k++) {
			if ($ticketNums[$j] === $hitNums[$k]) {
				$matchNum[$j] = $hitNums[$k];
			}
		}
	}
	$matchNums[] = $matchNum;
	// この辺でcountをechoすりゃ良くね？
	// わざわざ下のほうでループさせる分処理がムダ
}
var_dump($matchNums);
exit;
//1件もマッチしていないときnullになる。０と表示させたい　⇒　配列の初期化が出来ていなかった
foreach ($matchNums as $matchNum) {
	echo count($matchNum) . "\n";
}

//空白で区切られたデータを配列で返却する
function getLineDatasSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = split(" ", $lineData);
	return $lineDatas;
}
