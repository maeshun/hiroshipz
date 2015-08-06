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
		for ($j = 0; $j < 6; $j++) {
			if ($hitNum === $ticketNums[$j]) {
				$matchCount++;
			}
		}
	}
	$matchCounts[$i] = $matchCount;
}
//チケットごとのマッチした数を出力
foreach ($matchCounts as $matchCount) {
	echo $matchCount . "\n";
}

//空白で区切られたデータを配列で返却する
function getLineDatasSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = split(" ", $lineData);
	return $lineDatas;
}
