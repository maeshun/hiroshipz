<?php
$recipeFoodCount = trim(fgets(STDIN));//レシピの食材の数
for ($i = 0; $i < $recipeFoodCount; $i++) {
	$recipes[] = getLineDatasSplitedBySpace((fgets(STDIN)));
}

$possessedFoodCount = trim(fgets(STDIN));//所持している食材の数
for ($i = 0; $i < $possessedFoodCount; $i++) {
	$foodstuffs[] = getLineDatasSplitedBySpace((fgets(STDIN)));
}

foreach ($recipes as $recipe) {
	$recipeName = $recipe[0];//レシピの食材の名前
	$recipeCount = $recipe[1];//レシピの食材の量

	foreach ($foodstuffs as $foodstuff) {
		$foodName = $foodstuff[0];//所持している食材の名前
		$foodCount = $foodstuff[1];//所持している食材の量

		//レシピ名と食材名が一致した場合、作れる量を計算
		if ($recipeName == $foodName) {
			$amountOfMake = $foodCount / $recipeCount;
			if ($amountOfMake > 0) {
				$amountOfMakes[] = $amountOfMake;
			}
			continue;
		}
	}
}

//食材ごとの作れる量のうち、一番小さな値 = n人前の数
if (count($amountOfMakes) == $recipeFoodCount) {
	echo floor(min($amountOfMakes));//floorしないと割り算の段階で小数点が出ちゃうよ
} else {
	echo "0";
}


//空白で区切られたデータを配列で返却する
function getLineDatasSplitedBySpace($lineData) {
	$lineData = trim($lineData);
	$lineDatas = split(" ", $lineData);
	return $lineDatas;
}
