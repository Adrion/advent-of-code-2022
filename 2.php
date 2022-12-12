<?php 

$input = '';

$A = $X =  1;
$B = $Y =  2;
$C = $Z =  3;
$totalOutcomePart1 = 0;
$totalOutcomePart2 = 0;

// Prepare data
$lines = explode(PHP_EOL, $input);
$rounds = [];
foreach ($lines as $line) {
	$round = explode(' ', $line);
	$rounds[] = $round;
}

// PART 1 => 
foreach ($rounds as $round) {
	$roundOutcome =  game_round(${$round[0]},${$round[1]});
	$totalOutcomePart1 += $roundOutcome;
}

var_dump('PART1 =>  '.$totalOutcomePart1);


// PART 2 => 
foreach ($rounds as $round) {
	switch ($round[1]) {
		case 'X': // Loose
			(${$round[0]} -1 > 0) ? $round[1] = ${$round[0]} -1 : $round[1] = 3;
			break;
		case 'Y':
			$round[1] = ${$round[0]};
			break;
		case 'Z': // Win
			$round[1] = (${$round[0]}%3) +1; 
			break;
		default:
			break;
	}

	$roundOutcome =  game_round(${$round[0]}, $round[1]);
	$totalOutcomePart2 += $roundOutcome;
}

var_dump('PART2 =>  '.$totalOutcomePart2);



// Round
function game_round($player1, $player2) {
	$outcome = $player2;
	$match = $player1 - $player2;

	echo $player1 .' - '. $player2.PHP_EOL;
	if ($match == 0) {
		$outcome += 3;
	} elseif (($match < 0 && $match != -2) || ($match > 0 && $match == 2) ) {
		$outcome += 6;
	}
	return $outcome;
}