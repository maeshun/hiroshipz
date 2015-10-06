<?php
$numberOfCards = trim(fgets(STDIN));//カードの枚数

for ($i = 0; $i < $numberOfCards; $i++) {
	//カード番号
	$cardNums = trim(fgets(STDIN));
	$cardNums = str_split($cardNums);
	$cardNums = array_reverse($cardNums);

	outputSingleDidit($cardNums);
}


//カード番号１桁目を出力
function outputSingleDidit($cardNums) {
	//偶数桁・奇数桁の配列を取得
	for ($i = 1; $i < count($cardNums); $i++) {
		if ($i % 2 === 0) {
			$odds[] = $cardNums[$i];
		} else {
			$evens[] = $cardNums[$i];
		}
	}

	//奇数桁の総和を取得
	$totalOdd = array_sum($odds);

	//偶数桁の総和を取得
	foreach ($evens as $even) {
		$even = $even * 2;
		if ($even >= 10) {
			$even = substr($even, 0, 1) + substr($even, 1, 1);
		}
		$evensDoubled[] = $even;
	}
	$totalEven = array_sum($evensDoubled);

	$total = $totalOdd + $totalEven;

	//10で割り切れる1桁目(X)を出力
	$x = 10 - substr($total, -1, 1);
	if ($x === 10) {
		echo 0;
	} else {
		echo $x;
	}
	echo "\n";
}
