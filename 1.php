<?php

$input = ""; // set your input


$lines = explode(PHP_EOL, $input);
$elves = [];
$currentElve = 0;
foreach ($lines as $line) {
	if (!empty($line)) {
		$currentElve += (int)$line;
	} else {
		$elves[] = $currentElve;
		$currentElve = 0;		
	}
}
$elves[] = $currentElve;

rsort($elves);
echo 'Response part 1 - Top1 calories:'. $elves[0];
echo PHP_EOL.'Response part 2 - Top3 calories:'. ($elves[0] + $elves[1] + $elves[2]);
