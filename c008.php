<?php
$tags = getLineDatasSplitedBySpace((fgets(STDIN)));
$tagA = $tags[0];//タグA
$tagB = $tags[1];//タグB
$text = trim(fgets(STDIN));

//文字の検索ができる場合、処理を実行
while(mb_strpos($text, $tagA) !== false && mb_strpos($text, $tagB) !== false) {

	//tagAの終了位置を求める
	$positionA = mb_strpos($text, $tagA);
	$startPosition = ($positionA + mb_strlen($tagA));

	//tagA, B間の文字列の長さを求める
	$positionB = mb_strpos($text, $tagB);
	$partOfTextLength = ($positionB - $startPosition);

	//tagA, tagBで囲まれた文字列を出力
	if ($partOfTextLength) {
		$partOfText  =  mb_substr($text, $startPosition, $partOfTextLength);
		echo $partOfText . "\n";
	} else {
		echo "<blank>" . "\n";
	}

	//tagB以降の文字列を取得（ここで、+ mb_strlen($tagB)してなくてデバッグに時間がかかった..）
	$text = mb_substr($text, $positionB + mb_strlen($tagB));
}

//空白で区切られたデータを配列で返却する
function getLineDatasSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = explode(" ", $lineData);
	return $lineDatas;
}
