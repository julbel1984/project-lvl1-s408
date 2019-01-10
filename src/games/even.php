<?php

namespace BrainGames\Games\Even;

use function \BrainGames\GameLogic\gameLogic;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';
const RANDOM_MIN = 0;
const RANDOM_MAX = 100;

function isEven($number)
{
    return $number % 2 === 0;
}

function getAnswer($question)
{
    $answer = isEven($question) ? 'yes' : 'no';
    return $answer;
}

function play()
{
    $dataAttributes = function () {
        $question = rand(RANDOM_MIN, RANDOM_MAX);
        $answer = getAnswer($question);
        return [$question, $answer];
    };
    
    gameLogic(DESCRIPTION, $dataAttributes);
}
