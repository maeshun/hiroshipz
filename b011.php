<?php
$cardData = getLineDataSplitedBySpace(fgets(STDIN));
$pocketNumber = $cardData[0]; // ポケットの数
$cardNumber = $cardData[1]; // カードの番号
$backCardNumber = 0; // 裏側のカードの番号

// 下のような配列でやればよかった..
// [1, 2, 3]
// [6, 5, 4]

$binderNumber = ceil($cardNumber / $pocketNumber); // カードが入っているバインダーの番号
$lastOrder = $pocketNumber - 1; // ポケット内の最後のカードの順番

if ($binderNumber % 2 == 0) {
	// カードの入ったバインダーが偶数の場合
	$backBinderNumber = $binderNumber - 1;
	$cardOrder = $pocketNumber * $binderNumber % $cardNumber;	// ポケット内のカードの順番
	$maxNumber = $pocketNumber * $backBinderNumber;
	$backCardNumber = $maxNumber - ($lastOrder - $cardOrder);
} else {
	// カードの入ったバインダーが奇数の場合
	$backBinderNumber = $binderNumber + 1;
	$cardOrder = ($cardNumber - 1) % $pocketNumber;	// ポケット内のカードの順番
	$maxNumber = $pocketNumber * $backBinderNumber;
	$backCardNumber = $maxNumber - $cardOrder;
}


echo $backCardNumber;


/**
 * 空白で区切られたデータを配列で返却する
 *
 * @param string $lineData 元データ
 * @return array $lineData 配列に変換したデータ
 */
function getLineDataSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = explode(" ", $lineData);
	return $lineDatas;
}
