<?php
	$inputNumber = fgets(STDIN);
	//何年間か計算
	$years = explode(" " , $inputNumber);
	echo $years[1] - $years[0];
