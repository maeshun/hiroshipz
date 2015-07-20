<?php
	//5つある数字の最大・最小を求める
	define("COUNT" , 5);
	for($i = 0; $i < COUNT; $i++) {
		$inputNumbers[$i] = fgets(STDIN);
		$inputNumbers[$i] = (int)$inputNumbers[$i];
		//int型の変数にstr型の値が上書きされるので下記はNG
		//(int)$inputNumbers[$i] = fgets(STDIN);
	}
	echo max($inputNumbers) ."\n";
	echo min($inputNumbers);
