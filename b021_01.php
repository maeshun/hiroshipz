<?php
$wordCount = trim(fgets(STDIN)); // 単語の数

// 単語を複数系に変換する（正規表現）
for ($i = 0; $i < $wordCount; $i++) {

	$word = trim(fgets(STDIN)); // 単語
	$plural = convertThePlural($word);

	print $plural . "\n";
}


/**
 * 単語を複数形に変換する
 *
 * @param string $word 変換元の文字列
 * @return string $plural 複数形に変換した文字列
 */
function convertThePlural($word) {

	$plural = ""; // 複数形

	if (preg_match('/(s|sh|ch|o|x)$/', $word)) {
		$plural = $word . 'es';

	} elseif (preg_match('/(f|fe)$/', $word)) {
		$plural = preg_replace('/(f|fe)$/', 'ves', $word);

	} elseif (preg_match('/[^aiueo]y$/', $word)) {
		$plural = preg_replace('/y$/', 'ies', $word);

	} else {
		$plural = $word . 's';
	}

	return $plural;
}
