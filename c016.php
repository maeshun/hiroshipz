<?php
$inputText = trim(fgets(STDIN));
$strLength = strlen($inputText);
$outputText = "";

//Leet文とマッチした場合は、Leet文を出力
for ($i = 0; $i < $strLength; $i++) {
	$outputText .= getLeetChar($inputText[$i]);
}
echo $outputText;

// Leet変換した文字を返す
function getLeetChar($char) {
	$leets = array(
		'A' => 4,
		'E' => 3,
		'G' => 6,
		'I' => 1,
		'O' => 0,
		'S' => 5,
		'Z' => 2
	);
	if (isset($leets[$char])) {
		return $leets[$char];
	}
	return $char;//ここの処理すげぇ..
}
