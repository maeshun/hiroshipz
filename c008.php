<?php
$tags = getLineDatasSplitedBySpace((fgets(STDIN)));//[工事現場のx座標, 工事現場のy座標, 工事現場の騒音の届く距離]
$tagA = $tags[0];//タグA
$tagB = $tags[1];//タグB
$text = trim(fgets(STDIN));

$text  =  strstr($text, $tagA);
$partOfText  =  strstr($text, $tagB);
$pettern = '/^/';
preg_match_all($pattern, $subject, $matches)


//空白で区切られたデータを配列で返却する
function getLineDatasSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = explode(" ", $lineData);
	return $lineDatas;
}
