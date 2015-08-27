<?php
$data = getLineDatasSplitedBySpace(fgets(STDIN));
$boxs = $data[0];//箱の数
$diameter = $data[1] * 2;//直径

//収納できる箱かどうか判定
for ($i = 1; $i <= $boxs; $i++) {
	$availableBox = TRUE;//添字を添え字以外の何かに使うことはない。単純にTRUEを使う
	$boxDatas = getLineDatasSplitedBySpace(fgets(STDIN));
	foreach ($boxDatas as $boxData) {
		if ($boxData < $diameter) {
			$availableBox = FALSE;//判定だけだったらTRUE,FALSE
			break;//１個でも入らなかったら処理抜けれるよね
		}
	}
	//収納できる箱番号だけ出力
	if ($availableBox) {
		echo $availableBox . "\n";
	}
}


//空白で区切られたデータを配列で返却する
function getLineDatasSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = explode(" ", $lineData);
	return $lineDatas;
}
