<?php 

$dock = [
	[],
	[],
	[],
	[],
	[],
	[],
	[],
	[],
	[],
];
$dock2 = $dock;
$move_inputs = "";

$lines = explode(PHP_EOL, $move_inputs);

// PART 1
foreach ($lines as $line) {
	preg_match_all("/move ([0-9]+) from ([0-9]+) to ([0-9]+)/", $line, $matches);
	make_move($dock, (int)$matches[1][0], ((int)$matches[2][0]-1), ((int)$matches[3][0]-1));
	make_move_part2($dock2, (int)$matches[1][0], ((int)$matches[2][0]-1), ((int)$matches[3][0]-1));
}

echo 'Part 1 solution '.PHP_EOL;
foreach ($dock as $row) {
	echo $row[0];
}

echo PHP_EOL.'Part 2 solution '.PHP_EOL;
foreach ($dock2 as $row) {
	echo $row[0];
}

function make_move(&$dock, $move, $from, $to) {
	for ($i=0; $i < $move; $i++) { 
		array_unshift($dock[$to], array_shift($dock[$from]));	
	}
}


function make_move_part2(&$dock, $move, $from, $to) {
	$dock[$to] = array_merge(array_splice($dock[$from], 0, $move), $dock[$to]);
}


