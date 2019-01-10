<?php

namespace BrainGames\Games\Calc;

use function \BrainGames\GameLogic\gameLogic;

const DESCRIPTION = 'What is the result of the expression?';

const NUM_OPERATION = 2;
const OPERATION = ['+', '-', '*'];

const RANDOM_MAX = 10;

function calculate($firstNumber, $secondNumber, $operation)
{
    if ($operation === '+') {
        return $firstNumber + $secondNumber;
    } elseif ($operation === '-') {
        return $firstNumber - $secondNumber;
    } else {
        return $firstNumber * $secondNumber;
    }
}

function play()
{
    $dataAttributes = function () {
        $firstNumber = rand(0, RANDOM_MAX);
        $secondNumber = rand(0, RANDOM_MAX);
        $operation = rand(0, NUM_OPERATION);
        return [
            $firstNumber . " " . OPERATION[$operation] . " " . $secondNumber,
            $result = (string)(calculate($firstNumber, $secondNumber, OPERATION[$operation]))
        ];
    };
    
    gameLogic(DESCRIPTION, $dataAttributes);
}
