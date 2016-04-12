<?php
$imageData = getLineDataSplitedBySpace(fgets(STDIN));

$numOfPixelLine = $imageData[0]; // 一辺のpixelの数
$ratio = $imageData[1];
$pixelPerRatio = $numOfPixelLine / $ratio;

for ($i = 0; $i < $numOfPixelLine; $i++) {
	$pixels[] = getLineDataSplitedBySpace(fgets(STDIN));
}

$newPixels = []; // 新しく生成するpixel配列
$blocks = []; // pixelをひとまとめにした配列

// まずpixelを横に等分したブロックを作る
$blocks = array_chunk($pixels, $ratio);

// pixelを縦に等分する
foreach ($blocks as $row => $block) {
	for ($i = 0; $i < $ratio; $i++) {
		$pos = 0;

		// ブロックの合計値を$newPixelsに格納
		for ($j = 0; $j < $numOfPixelLine; $j++) {
			$newPixels[$row][$pos] += $block[$i][$j];
			// $ratioで割り切れたら次のブロックなので、$newPixelsの添字を更新
			if (($j + 1) % $ratio == 0) {
				$pos++;
			}
		}
	}
}

// 各ブロックの平均値を出力する
foreach ($newPixels as $newPixel) {
	for ($i = 0; $i < count($newPixel); $i++) {
		$newPixel[$i] = floor($newPixel[$i] / pow($ratio, 2));
	}
	echo implode(" ", $newPixel) . "\n";
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
