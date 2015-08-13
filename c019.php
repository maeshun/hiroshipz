<?php
$countNum = (int)trim(fgets(STDIN));

for ($i = 0; $i < $countNum; $i++) {
	$inputNum = (int)trim(fgets(STDIN));
	$divisors = array();//約数
	//約数を求める
	for ($j = 1; $j < $inputNum; $j++) {
		if ($inputNum % $j == 0) {
			$divisors[] = $j;
		}
	}
	//約数の合計を求める
	$total = array_sum($divisors);
	//約数の合計と入力値の差で判定
	$diff = ($total - $inputNum);
	switch ($diff) {
		case 0:
			echo "perfect";
			break;
		case -1:
		case 1:
			echo "nearly";
			break;
		default:
			 echo "neither";
	}
	echo "\n";
}
