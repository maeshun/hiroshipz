<?php
$numberOfCards = trim(fgets(STDIN));//カードの枚数

for ($i = 0; $i < $numberOfCards; $i++) {
	//カード番号
	$cardNums = trim(fgets(STDIN));
	$cardNums = str_split($cardNums);
	$cardNums = array_reverse($cardNums);

	// イマイチなにをしたい関数なのかが関数名から見えてこない
	// singleDiditってなに？
	outputSingleDidit($cardNums);
}

// 関数が多機能すぎる印象
// 値を計算して返すくらいにしておいたほうがよい
// 後々計算は使うけど、表示はしないような利用ケースが来た場合困る

//カード番号１桁目を出力
function outputSingleDidit($cardNums) {
	//偶数桁・奇数桁の配列を取得
	for ($i = 1; $i < count($cardNums); $i++) {
		if ($i % 2 === 0) {
			// あとでarray_sumやるくらいならここで総和計算すれば良くない？
			// 全部の値まわしてるんだから
			// あと、$i%2===0なのに代入する変数が$oddsなのはなにも知らずに後から見た場合混乱する
			// 一言説明を書いておくべき
			$odds[] = $cardNums[$i];
		} else {
			$evens[] = $cardNums[$i];
		}
	}

	//奇数桁の総和を取得
	$totalOdd = array_sum($odds);

	//偶数桁の総和を取得
	foreach ($evens as $even) {
		// foreachのループしてる変数の代入し直しはしない方が良い
		// このループがなんのループかがわからなくなる
		$even = $even * 2;
		if ($even >= 10) {
			// ここもコメントが欲しい。10以上のときはなにやってるの？
			$even = substr($even, 0, 1) + substr($even, 1, 1);
		}
		// doubledEvensじゃない？
		$evensDoubled[] = $even;
	}
	$totalEven = array_sum($evensDoubled);

	$total = $totalOdd + $totalEven;

	//10で割り切れる1桁目(X)を出力
	// 10で割ってどうのこうのって書いてあるのに、わざわざn桁目を足してどうのこうのってやるからバグる
	// 10で割った余りをどうするかって考えれば良いじゃない
	$x = 10 - substr($total, -1, 1);
	if ($x === 10) {
		echo 0;
	} else {
		echo $x;
	}
	echo "\n";
}
