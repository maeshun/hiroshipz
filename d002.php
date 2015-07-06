<?php
    $input_lines = fgets(STDIN);
    $a = 10;
    $b = 20;
    if ($a > $b) {
        echo $a;
    } elseif ($a < $b) {
        echo $b;
    } else {
        echo "eq";
    }