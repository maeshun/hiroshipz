<?php

$gameData = getLineDataSplitedBySpace(fgets(STDIN));

$numOfColsTrump = $gameData[0]; // トランプの縦列の枚数
$numOfPlayer = $gameData[2]; // プレイヤーの数
$trump = [[]]; // トランプの番号を保持する配列
$matchedTrumpOfPlayers = []; // プレイヤーごとのマッチしたトランプの数を保持する配列

// トランプの初期化
for ($i = 0; $i < $numOfColsTrump; $i++) {
	$trump[$i] = getLineDataSplitedBySpace(fgets(STDIN));
}
// プレイヤーごとのマッチしたトランプの数の初期化
for ($i = 0; $i < $numOfPlayer; $i++) {
	$matchedTrumpOfPlayers[$i] = 0;
}

$turn = trim(fgets(STDIN));
$currentPlayer = 0; // 現在のプレイヤー

for ($i = 0; $i < $turn; $i++) {
	$turnOverTrumps = getLineDataSplitedBySpace(fgets(STDIN)); // めくったトランプ
	$matchFlag = detectMatchTrumpNumber($turnOverTrumps, $trump);

	if ($matchFlag) {
		$matchedTrumpOfPlayers[$currentPlayer] += 2;
	} else {
		$currentPlayer = playerChange($currentPlayer, $numOfPlayer);
	}
}

foreach ($matchedTrumpOfPlayers as $matchedTrumpOfPlayer) {
	echo $matchedTrumpOfPlayer . "\n";
}


/**
 * めくったトランプがマッチしているか判定する
 *
 * @param array $turnOverTrumps めくったトランプのデータ
 * @param array $trump トランプのデータ
 * @return bool
 */
function detectMatchTrumpNumber($turnOverTrumps, $trump) {

	$turnOverNum1 = $trump[$turnOverTrumps[0] - 1][$turnOverTrumps[1] - 1]; // 1回目にめくったトランプの番号
	$turnOverNum2 = $trump[$turnOverTrumps[2] - 1][$turnOverTrumps[3] - 1]; // 2回目にめくったトランプの番号

	if ($turnOverNum1 == $turnOverNum2) {
		return true;
	} else {
		return false;
	}
}

/**
 * プレイヤーのターンをチェンジする
 *
 * @param int $currentPlayer 現在のプレイヤー
 * @param int $numOfPlayer プレイヤーの数
 * @return int $nextPlayer 次のプレイヤー
 */
function playerChange($currentPlayer, $numOfPlayer) {
	$nextPlayer = ($currentPlayer + 1);

	// 現在のプレイヤーが最後のプレイヤーだったら、最初のプレイヤーにターンを戻す
	if ($currentPlayer == ($numOfPlayer - 1)) {
		$nextPlayer = 0;
	}
	return $nextPlayer;
}

/**
 * 空白で区切られたデータを配列で返却する
 *
 * @param string $lineData 元データ
 * @return array $lineData 配列に変換したデータ
 */
function getLineDataSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = explode(" ", $lineData);
	return $lineDatas;
}
