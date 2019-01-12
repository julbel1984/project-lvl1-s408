<?php

namespace BrainGames\Games\Prime;

use function \BrainGames\GameLogic\gameLogic;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const RANDOM_MIN = 2;
const RANDOM_MAX = 20;

function isPrime($number)
{
    if ($number < 2) {
        return false;
    }
    for ($i = 2; $i <= $number / 2; $i += 1) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}

function getAnswer($question)
{
    $answer = isPrime($question) ? 'yes' : 'no';
    return $answer;
}

function play()
{
    $generateGameData = function () {
        $question = rand(RANDOM_MIN, RANDOM_MAX);
        $answer = getAnswer($question);
        return [$question, $answer];
    };
    
    gameLogic(DESCRIPTION, $generateGameData);
}
