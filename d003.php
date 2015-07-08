<?php
	$input_lines = fgets(STDIN);
	
	// コードが汚い。空白位置は揃えること
	// for ($i = 1; $i < 10; $i++) {
	// ここでの10は定数なので先にdefineしておいたほうが良い
	for ($i=1; $i < 10 ; $i++) {
		// numberという配列名は抽象的すぎる
		// answerとか「かけ算の答え」を意味する何かにしたほうが良い
		$number[] = $input_lines * $i;
	}
	// ここはまとめて
	// echo implode(" " , $number);
	// とかでも良い。好きずき。
	$multiple = implode(" " , $number);
	// 変数のechoに""は不要
	echo "$multiple";
