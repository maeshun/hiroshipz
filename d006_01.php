<?php
$splitedData = getLineDatasSplitedBySpace(fgets(STDIN));

$lengthNumber = $splitedData[0];
$lengthUnit = $splitedData[1];

$outputLength = $lengthNumber;

switch ($lengthUnit) {
	//必ず下まで処理するので、途中のbreakはいらない
	case 'km':
		$outputLength = kmToM($outputLength);
	case 'm':
		$outputLength = mToCm($outputLength);
	case 'cm':
		$outputLength = cmToMm($outputLength);
	default:
		break;
}
echo $outputLength;

function kmToM ($length) {
	return $length * 1000;
}

function mToCm ($length) {
	return $length * 100;
}

function cmToMm ($length) {
	return $length * 10;
}

//空白で区切られたデータを配列で返却する
function getLineDatasSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = split(" ", $lineData);
	return $lineDatas;
}
