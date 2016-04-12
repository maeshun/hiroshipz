<?php
	$inputLine = trim(fgets(STDIN));
	//メンバー全員をカンマ区切りで出力
	for ($i = 0; $i < $inputLine; $i++) {
		$members[] = trim(fgets(STDIN));
	}
	$members = implode(",", $members);
	echo "Hello " . $members . ".";
