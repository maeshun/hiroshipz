<?php
$data = getLineDatasSplitedBySpace(fgets(STDIN));
$boxs = $data[0];//箱の数
$diameter = $data[1] * 2;//直径

//収納できる箱かどうか判定
for ($i = 1; $i <= $boxs; $i++) {
	$availableBox = $i;
	$boxDatas = getLineDatasSplitedBySpace(fgets(STDIN));
	foreach ($boxDatas as $boxData) {
		if ($boxData < $diameter) {
			$availableBox = 0;
		}
	}
	//収納できる箱番号だけ出力
	if (!$availableBox == 0) {
		echo $availableBox . "\n";
	}
}


//空白で区切られたデータを配列で返却する
function getLineDatasSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = explode(" ", $lineData);
	return $lineDatas;
}
