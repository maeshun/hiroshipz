<?php

define("CARD_NUMBER_LENGTH", 16);

$cardDatas = trim(fgets(STDIN));

$yealyMargin = 0;

for ($i = 0; $i < $cardDatas; $i++) {
	$cardNumber = trim(fgets(STDIN));

	echo getLastNumber($cardNumber) . "\n";

}

/**
 * カード番号の末尾を計算する
 * @param type $cardNumber
 * @return type int
 */
function getLastNumber($cardNumber) {
	// 偶数桁の数字をそれぞれ2倍し総和をとったものをeven
	$even = 0;
	// 奇数桁の数字の総和をとったものをodd
	$odd = 0;

	// 左から16桁目がXなので15桁目まで計算
	for ($j = 0; $j < CARD_NUMBER_LENGTH - 1; $j++) {
		// 奇数桁
		if ($j % 2 != 0) {
			$odd += $cardNumber[$j];
		} else {
			$even += getCalculatedEvenNumber($cardNumber[$j]);
		}
	}

	// 余りの計算
	$remainder = ( $odd + $even ) % 10;
	// 余りなしはの場合Xは0
	if ($remainder === 0) {
		return 0;
	}

	// 余りがある場合は10-余りがX
	return 10 - $remainder;
}


/**
 * 偶数桁の総和する数値を算出
 * ただし、2倍したあと2桁の数字になるものは、1の位と10の位の数を足して1桁の数字にしたあと、総和をとる
 * @param type $cardNumber
 * @return type int
 */
function getCalculatedEvenNumber($cardNumber) {
	$doubledNumber = $cardNumber * 2;
	// 2倍して2桁じゃないとき
	if ($doubledNumber < 10) {
		return $doubledNumber;
	}

	// 桁同士の和（必ず10のくらいは1なので）
	$returnNumber = $doubledNumber - 10 + 1;
	return $returnNumber;
}

?>