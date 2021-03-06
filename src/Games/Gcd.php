<?php

namespace BrainGames\Games\Gcd;

use function \BrainGames\GameLogic\gameLogic;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';
const RANDOM_MIN = 1;
const RANDOM_MAX = 20;

function gcd($a, $b)
{
    if ($b === 0) {
        return abs($a);
    }
    return gcd($b, $a % $b);
}

function play()
{
    $generateGameData = function () {
        $firstNumber = rand(RANDOM_MIN, RANDOM_MAX);
        $secondNumber = rand(RANDOM_MIN, RANDOM_MAX);
        $question = "{$firstNumber}  {$secondNumber}";
        $answer = (string) (gcd($firstNumber, $secondNumber));
        return [$question, $answer];
    };
    
    gameLogic(DESCRIPTION, $generateGameData);
}
