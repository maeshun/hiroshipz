<?php
$coordinates = getLineDataSplitedBySpace(fgets(STDIN));
$x = $coordinates[0]; // x座標
$y = $coordinates[1]; // y座標
$z = $coordinates[2]; // z座標

for ($i = 0; $i < $z; $i++) {

	// 正面から立方体を見た図
	$cubeFromFrontView = "";
	for ($j = 0; $j < $y; $j++) {
		$cubeFromFrontView .= ".";
	}

	for ($j = 0; $j < $x + 1; $j++) {

		$cubeData = trim(fgets(STDIN)); // y軸方向に並んだ立方体の配置データ

		if ($cubeData === "--") {
			break;
		}

		// x軸の手前に立方体が存在する場合、正面からも立方体が見える
		for ($k = 0; $k < $y; $k++) {
			if ($cubeFromFrontView[$k] == "." && $cubeData[$k] == "#") {
				$cubeFromFrontView[$k] = "#";
			}
		}

	}

	$cubeFromFrontViews[$i] = $cubeFromFrontView;
}

for ($i = count($cubeFromFrontViews) - 1; 0 <= $i; $i--) {
	echo $cubeFromFrontViews[$i] . "\n";
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
