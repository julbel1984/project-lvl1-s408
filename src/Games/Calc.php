<?php

namespace BrainGames\Games\Calc;

use function \BrainGames\GameLogic\gameLogic;

const DESCRIPTION = 'What is the result of the expression?';
const SIGN_MAP = ['+', '-', '*'];
const RANDOM_MAX = 10;

function calculate($firstNumber, $secondNumber, $sign)
{
    if ($sign === '+') {
        return $firstNumber + $secondNumber;
    } elseif ($sign === '-') {
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
        $sign = SIGN_MAP[array_rand(SIGN_MAP)];

        $question = "{$firstNumber}{$sign}{$secondNumber}";
        $answer = (string)(calculate($firstNumber, $secondNumber, $sign));
        return [$question, $answer];
    };
    
    gameLogic(DESCRIPTION, $dataAttributes);
}
