<?php
$wordCount = trim(fgets(STDIN)); // 単語の数

/// 単語を複数系に変換する
for ($i = 0; $i < $wordCount; $i++) {

	$word = trim(fgets(STDIN)); // 単語
	$formattedWord = ""; // 複数形に変換された単語

	switch (substr($word, -1)) {
		case 's':
		case 'o':
		case 'x':
			$formattedWord = $word . 'es';
			break;
	}

	switch (substr($word, -2)) {
		case 'sh':
		case 'ch':
			$formattedWord = $word . 'es';
			break;
	}

	switch (substr($word, -1)) {
		case 'f':
			// 末尾のfだけ置換する
			$replacedWord = substr($word, 0, strlen($word) - 1);
			$formattedWord = $replacedWord . 'ves';
			break;
	}

	switch (substr($word, -2)) {
		case 'fe':
			// 末尾のfeだけ置換する
			$replacedWord = substr($word, 0, strlen($word) - 2);
			$formattedWord = $replacedWord . 'ves';
			break;
	}

	if (substr($word, -1) == 'y') {
		// 末尾から2番目の文字が母音の場合、何もしない
		switch (substr($word, -2, 1)) {
			case 'a':
			case 'i':
			case 'u':
			case 'e':
			case 'o':
			// $formattedWord = $wordのようなムダな処理をしていたので、ここで正しい回答を出してなかった。問題の理解力不足＆ムダな処理
				break;

			default:
				// 末尾のyだけ置換する
				$replacedWord = substr($word, 0, strlen($word) - 1);
				$formattedWord = $replacedWord . 'ies';
				break;
		}
	}

	// 上記のいずれの条件にも当てはまらない場合、末尾にsを付ける
	if ($formattedWord === "") {
		// ここで文字列の連結を$word + s;とタイプミスし、出力結果が0になったので、詰まった
		// エラーにならずint型に文字列を型変換して0を返すって..
		$formattedWord = $word . 's';
	}

	print $formattedWord . "\n";
}
