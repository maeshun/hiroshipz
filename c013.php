<?php
$hateNumber = trim(fgets(STDIN));//嫌いな数字
$totalSickrooms = trim(fgets(STDIN));//病室の総数
$hopeCount = 0;//希望する病室の数

//嫌いな数字が含まれていない病室番号を出力
for ($i = 0; $i < $totalSickrooms; $i++) {
	$sickroomNumber = trim(fgets(STDIN));//病室番号
	if (strpos($sickroomNumber, $hateNumber) === false) {
		echo $sickroomNumber . "\n";
		// 実装としては間違いじゃないけれど、hopeCountは数を数えるための変数ではないよね？
		// それであればフラグとして判定するほうが良い。
		// （実際おれもコード読んでて、この件数どこで使うんだと思ってしまった）
		$hopeCount++;
	}
}
//希望の病室が１つもなかった場合
if ($hopeCount == 0) {
	echo "none";
}
