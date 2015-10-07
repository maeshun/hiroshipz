<?php
$numberOfCards = trim(fgets(STDIN));//カードの枚数

for ($i = 0; $i < $numberOfCards; $i++) {
	//カード番号
	$cardNum = trim(fgets(STDIN));
	$cardNums = str_split($cardNum);

	// イマイチなにをしたい関数なのかが関数名から見えてこない
	// singleDigitってなに？
	$x = outputFirstDigit($cardNums);
	echo $x . "\n";
}

// 関数が多機能すぎる印象
// 値を計算して返すくらいにしておいたほうがよい
// 後々計算は使うけど、表示はしないような利用ケースが来た場合困る

//カード番号１桁目を出力
function outputFirstDigit($cardNums) {
	//偶数桁・奇数桁の配列を取得

	$totalOdd = 0;//奇数の合計
	$totalEven = 0;//偶数の合計
	print_r($cardNums);

	for ($i = 0; $i < count($cardNums) - 1; $i++) {
		if ($i % 2 === 0) {
			// あとでarray_sumやるくらいならここで総和計算すれば良くない？
			// 全部の値まわしてるんだから
			// あと、$i%2===0なのに代入する変数が$oddsなのはなにも知らずに後から見た場合混乱する
			// 一言説明を書いておくべき
			$evens[] = $cardNums[$i];
		} else {
			//奇数行の総和を取得
			$totalOdd += $cardNums[$i];
		}
	}

	print_r($evens);
	print_r($odds);

	//偶数桁の総和を取得
	foreach ($evens as $even) {
		// foreachのループしてる変数の代入し直しはしない方が良い
		// このループがなんのループかがわからなくなる
		$doubledEven = $even * 2;
		if ($doubledEven >= 10) {
			// 10以上の場合、１桁目と2桁目の数の合計を代入する
			$doubledEven = substr($doubledEven, 0, 1) + substr($doubledEven, 1, 1);
		}
		// doubledEvensじゃない？
		$totalEven += $doubledEven;
	}

	$total = $totalOdd + $totalEven;

	//10で割り切れる1桁目(X)を出力
	// 10で割ってどうのこうのって書いてあるのに、わざわざn桁目を足してどうのこうのってやるからバグる
	// 10で割った余りをどうするかって考えれば良いじゃない
	$x = 0;
	$remainder = $total % 10;
	if ($remainder !== 0) {
		$x = 10 - $remainder;
	}
	return $x;
}
