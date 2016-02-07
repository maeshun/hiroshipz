<?php
$wordCount = trim(fgets(STDIN)); // 単語の数

/// 単語を複数系に変換する（正規表現）
for ($i = 0; $i < $wordCount; $i++) {

	$word = trim(fgets(STDIN)); // 単語
	$formattedWord = ""; // 複数形に変換された単語

	if (preg_match('/s$|sh$|ch$|o$|x$/', $word)) {
		$formattedWord = $word . 'es';
	}

	if (preg_match('/f$/', $word)) {
		$replacedWord = substr($word, 0, strlen($word) - 1);
		$formattedWord = $replacedWord . 'ves';
	}

	if (preg_match('/fe$/', $word)) {
		$replacedWord = substr($word, 0, strlen($word) - 2);
		$formattedWord = $replacedWord . 'ves';
	}

	// 末尾がyかつ末尾から2文字目が[aiueo]のパターンでない場合の処理　'/(?<![aiueo])y$/'のパターンだとNG
	if (preg_match('/y$/', $word)) {
		$replacedWord = substr($word, 0, strlen($word) - 1);

		if (!preg_match('/[aiueo]$/', $replacedWord)) {
			$formattedWord = $replacedWord . 'ies';
		}
	}

	// 上記のいずれの条件にも当てはまらない場合、末尾にsを付ける
	if ($formattedWord === "") {
		$formattedWord = $word . 's';
	}

	print $formattedWord . "\n";
}
