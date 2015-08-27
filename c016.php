<?php
// 変数に統一性がない
// スネーク？キャメル？
$inputText = trim(fgets(STDIN));
$str_length = strlen($inputText);
$leets = array(
	'A' => 4,
	'E' => 3,
	'G' => 6,
	'I' => 1,
	'O' => 0,
	'S' => 5,
	'Z' => 2
);
//Leet文とマッチした場合は、Leet文を出力
for ($i = 0; $i < $str_length; $i++) {
	$outputText = $inputText[$i];
	// ここ全部回す必要ない
	// $leets['A'] = 4
	// なんだよね？
	foreach ($leets as $key => $value) {
		if ($key == $inputText[$i]) {
			$outputText = $leets[$inputText[$i]];
			break;
		}
	}
	echo $outputText;
}
