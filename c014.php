<?php
$data = getLineDatasSplitedBySpace(fgets(STDIN));
$boxs = $data[0];//箱の数
$diameter = $data[1] * 2;//直径

//収納できる箱かどうか判定
for ($i = 1; $i <= $boxs; $i++) {
	$availableBox = TRUE;//添字を添え字以外の何かに使うことはない。フラグ制御にはTRUE / FALSE
	$boxDatas = getLineDatasSplitedBySpace(fgets(STDIN));
	//この書き方の場合、3つOKだったらOKという書き方
	//逆を考えると一つでもダメだったらダメ
	//後者で考えたほうが処理が減る
	foreach ($boxDatas as $boxData) {
		if ($boxData < $diameter) {
			$availableBox = FALSE;//判定だけだったらTRUE,FALSE
			break;//１個でも入らなかったら処理抜けれるよね
		}
	}
	//このif内の処理に違和感。。。
	//!$a の $aに10が入っていた場合どうなるの？
	//フラグ制御にすべき

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
