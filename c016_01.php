<?php

$inputedString = trim(fgets(STDIN));

$ouputString = "";
for ($i = 0; $i < strlen($inputedString); $i++) {
	$ouputString .= getLeetChar($inputedString[$i]);
}
echo $ouputString;

// Leet変換した文字を返す
function getLeetChar($character) {
	$leetTable = getLeetArray();
	if (isset($leetTable[$character])) {
		return $leetTable[$character];
	}
	return $character;
}

// Leetで利用する連想配列を返す
function getLeetArray() {
	return array(
			"A" => 4,
			"E" => 3,
			"G" => 6,
			"I" => 1,
			"O" => 0,
			"S" => 5,
			"Z" => 2
		);	
}

?>