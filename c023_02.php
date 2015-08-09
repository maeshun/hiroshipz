<?php
$hitNums = getLineDatasSplitedBySpace(fgets(STDIN));//当選番号
$tickets = trim(fgets(STDIN));//チケットの枚数
$matchCounts = [];

//当選番号とチケット番号の比較
for ($i = 0; $i < $tickets; $i++) {
	$matchCount = 0;
	$ticketNums = getLineDatasSplitedBySpace(fgets(STDIN));
	//当選番号とチケット番号がマッチしたら、カウントする
	foreach ($hitNums as $hitNum) {
		// 仕様変更があって「当選番号の数が10個になりました」
		// ってときにここ直す必要が出てくる
		// つまり仕様変更に弱い書き方
		// foreachを使わなかった理由はなに？ 
		for ($j = 0; $j < 6; $j++) {
			if ($hitNum === $ticketNums[$j]) {
				$matchCount++;
			}
			// ここも効率が悪い
			// クジなので、同じ数字は2回出てこないはず
			// ヒットした時点でループを抜けないと、残りの処理分のループがムダ
		}
	}
	// ここでechoすりゃよくね？
	$matchCounts[$i] = $matchCount;
}
//チケットごとのマッチした数を出力
foreach ($matchCounts as $matchCount) {
	echo $matchCount . "\n";
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

}




//空白で区切られたデータを配列で返却する
function getLineDatasSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = split(" ", $lineData);
	return $lineDatas;
}
