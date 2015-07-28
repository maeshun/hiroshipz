<?php
$splitedData = getLineDatasSplitedBySpace(fgets(STDIN));

$string = $splitedData[0];
$index = $splitedData[1];

echo substr($string, $index -1, 1);//第３引数は返される文字の長さの指定

//空白で区切られたデータを配列で返却する
function getLineDatasSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = split(" ", $lineData);
	return $lineDatas;
}
