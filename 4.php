<?php 


$input = '';

// Prepare data
$lines = explode(PHP_EOL, $input);
$cleaning_zones_part1 = [];
$cleaning_zones_part2 = [];


// PART 1
// Find fully contained ranges

// Try solution with string comparaison
foreach ($lines as $line) {
	$ranges = array_map(function($data) {
		$split = explode('-', $data);
		return '.'.implode('.', range($split[0], $split[1])).'.';
	}, explode(',', $line));
	
	$cleaning_zones_part1[] = $ranges;
}

$result_part1 = 0;
foreach ($cleaning_zones_part1 as $ranges) {
	if (strpos($ranges[0], $ranges[1]) !== false || strpos($ranges[1], $ranges[0]) !== false) {
		$result_part1++;
	}
}

var_dump($result_part1);

// PART 2
// Find partial overlaps
foreach ($lines as $line) {
	$ranges = array_map(function($data) {
		$split = explode('-', $data);
		return range($split[0], $split[1]);
	}, explode(',', $line));
	
	$cleaning_zones_part2[] = $ranges;
}

$result_part2 = 0;
foreach ($cleaning_zones_part2 as $ranges) {
	$res = array_intersect(...$ranges);
	if (count($res) > 0) $result_part2++;
}

var_dump($result_part2);
