<?php

// 親のカード
$parentCard = getLineDataSplitedBySpace(fgets(STDIN));

// 子の情報
$childrenCount = trim(fgets(STDIN));

for ($i = 0; $i < $childrenCount; $i++) {
	// 子のカード
	$childCard = getLineDataSplitedBySpace(fgets(STDIN));

	judge($parentCard, $childCard);

}

// High and Lowの判定
function judge($parentCard, $childCard) {
	$result = "Low";

	// 親の1枚目のほうが子の1枚目より
	// 親の1枚目と子の1枚目が同じとき、親の2枚目が子の2枚目より小さい
	if (($parentCard[0] > $childCard[0]) ||
		 ($parentCard[0] === $childCard[0] && $parentCard[1] < $childCard[1])) {
		$result = "High";
	} 
	echo $result . "\n";
}

/**
 * 空白で区切られたデータを配列で返却する
 *
 */
function getLineDataSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = split(" ", $lineData);
	return $lineDatas;
}


?>