<?php 

$input = '';

// Prepare data
$lines = explode(PHP_EOL, $input);
$rucksacks = [];
$total = 0;
$total2 = 0;

foreach ($lines as $line) {
	$rucksacks[] = str_split($line, strlen($line)/2);
}

// PART 1
foreach ( $rucksacks as $rucksack) {
    $letter = findCommonLetter($rucksack[0], $rucksack[1]);
    $total += letterToValue($letter);
};
var_dump('PART 1 => '.$total);

// PART 2 
for ($i=0; $i < count($lines); $i = $i+3) { 
	// code...
	$rucksacksPart2[] = [$lines[$i], $lines[$i+1], $lines[$i+2]];

}
foreach ($rucksacksPart2 as $rucksack) {
	$letter = findCommonLetter($rucksack[0], $rucksack[1], $rucksack[2]);
    $total2 += letterToValue($letter);
}
var_dump('PART 1 => '. $total2);



function findCommonLetter($str1, ...$strs) {
	$params = [];
	foreach ($strs as $str) {
		$params[] = str_split($str);
	}
	return implode(array_unique(array_intersect(str_split($str1), ...$params)));
}


function letterToValue($letter) {
	$upper = range('A', 'Z') ;
	$lower = range('a', 'z') ;

	if (ctype_upper($letter)) {
	    return (array_search($letter, $upper) + 27); 
	} else {
	    return  (array_search($letter, $lower) + 1); 
	}
}