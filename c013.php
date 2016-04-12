<?php
$hateNumber = trim(fgets(STDIN));//嫌いな数字
$totalSickrooms = trim(fgets(STDIN));//病室の総数
$hopeCount = 0;//希望する病室の数
$disLike = TRUE;//フラグで判定すること

//嫌いな数字が含まれていない病室番号を出力
for ($i = 0; $i < $totalSickrooms; $i++) {
	$sickroomNumber = trim(fgets(STDIN));//病室番号
	if (strpos($sickroomNumber, $hateNumber) === false) {
		echo $sickroomNumber . "\n";
		$disLike = FALSE;
	}
}
//希望の病室が１つもなかった場合
if ($disLike) {
	echo "none";
}
