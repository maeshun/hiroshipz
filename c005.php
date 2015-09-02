<?php
$numOfIpaddress = trim(fgets(STDIN));
define("OCTET", 4);

for ($i = 0; $i < $numOfIpaddress; $i++) {
	$flag = TRUE;
	$addressDatas = getLineDatasSplitedBySpace(fgets(STDIN));

	//0 ~ 255以内か判定
	foreach ($addressDatas as $addressData) {
		if ($addressData <= 0 && 255 < $addressData) {
			$flag = FALSE;
		} else {
			$flag = TRUE;
		}
	}

	//第4オクテットのIPアドレスか判定
	if (count($addressDatas) != OCTET) {
		$flag = FALSE;
	};

	if ($flag) {
		echo "True";
	} else {
		echo "False";
	}
}

//カンマで区切られたデータを配列で返却する
function getLineDatasSplitedBySpace($lineData) {
	$lineDatas = explode(".", $lineData);
	return $lineDatas;
}
