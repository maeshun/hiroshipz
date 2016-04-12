<?php
$parentCard = getLineDatasSplitedBySpace(fgets(STDIN));
$cardCount = trim(fgets(STDIN));//子カードの枚数

//子カードの生成
for ($i = 0; $i < $cardCount; $i++) {
	$childCards[$i] = getLineDatasSplitedBySpace(fgets(STDIN));
}

//親カードと子カードの強弱を判定
foreach ($childCards as $childCard) {
	if ($childCard[0] < $parentCard[0]) {
		echo "High";
	} elseif ($childCard[0] == $parentCard[0]){
		if ($childCard[1] > $parentCard[1]) {
			echo "High";
		} else {
			echo "Low";
		}
	} else {
		echo "Low";
	}
	echo "\n";
}

//空白で区切られたデータを配列で返却する
function getLineDatasSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = split(" ", $lineData);
	return $lineDatas;
}
