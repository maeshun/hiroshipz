<?php
$hitNumbers = getLineDatasSplitedBySpace(fgets(STDIN));//当選番号
$tickets = trim(fgets(STDIN));//チケットの枚数

//当選した数の表示
for ($i = 0; $i < $tickets; $i++) {
	$ticketNumbers = getLineDatasSplitedBySpace(fgets(STDIN));
	displayHitCount($hitNumbers, $ticketNumbers);
}

/************************
 * 課題
 * 下記のメソッドを完成させて呼び出して
 * このプログラムの別解をだしてください
 ***********************/

/**
 * 当選数表示関数
 *
 * 引数で受け取った自分のクジの番号の配列と当選番号の配列を基に
 * 当たった番号の数を表示する
 *
 * @param array $hitNumbers
 *				当選番号の配列
 * @param array $ticketNumbers
 * 				自分のクジ番号の配列
 **/
function displayHitCount($hitNumbers, $ticketNumbers) {
	$matchCount = 0;
	foreach ($hitNumbers as $hitNumber) {
		// 仕様変更があって「当選番号の数が10個になりました」
		// ってときにここ直す必要が出てくる
		// つまり仕様変更に弱い書き方
		// foreachを使わなかった理由はなに？
		foreach ($ticketNumbers as $ticketNumber) {
			if ($hitNumber === $ticketNumber) {
				$matchCount++;
				break;
			}
			// ここも効率が悪い
			// クジなので、同じ数字は2回出てこないはず
			// ヒットした時点でループを抜けないと、残りの処理分のループがムダ
		}
	}
	// ここでechoすりゃよくね？
	echo $matchCount . "\n";
}

//空白で区切られたデータを配列で返却する
function getLineDatasSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = split(" ", $lineData);
	return $lineDatas;
}
