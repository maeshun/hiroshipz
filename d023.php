<?php
$inputLine = trim(fgets(STDIN));
$numOfA = preg_match_all('/A/', $inputLine);

echo $numOfA;
