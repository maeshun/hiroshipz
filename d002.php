<?php
    $inputLines = fgets(STDIN);
    $inputNumbers = explode(" " , $inputLines);
    $num1 = (int)$inputNumbers[0];
    $num2 = (int)$inputNumbers[1];

    if($num1 > $num2) {
        echo $num1;
    } elseif($num1 < $num2) {
        echo $num2;
    } elseif($num1 === $num2) {
        echo "eq";
    }
