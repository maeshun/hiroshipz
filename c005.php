<?php
$numOfIpaddress = trim(fgets(STDIN));
define("OCTET", 4);

for ($i = 0; $i < $numOfIpaddress; $i++) {
	$addressDatas = getLineDatasSplitedByComma(fgets(STDIN));

	//第4オクテットのIPアドレスか判定
	if (count($addressDatas) != OCTET) {
		echo "False" . "\n";
		continue;
	}

	//0 ~ 255以内か判定
	$numFlag = TRUE;
	foreach ($addressDatas as $addressData) {
		if (0 > $addressData || 255 < $addressData) {
			$numFlag = FALSE;
			break;
		}
	}

	//オクテットの数が4かつ数値が0 ~ 255の場合True
	if ($numFlag) {
		echo "True" . "\n";
	} else {
		echo "False" . "\n";
	}
}

//カンマで区切られたデータを配列で返却する
function getLineDatasSplitedByComma($lineData) {
	$lineDatas = explode(".", $lineData);
	return $lineDatas;
}
