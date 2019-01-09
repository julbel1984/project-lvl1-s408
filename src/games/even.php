<?php

namespace BrainGames\Games\Even;

use function \BrainGames\Cli\gameLogic;

const GAME_CONDITIONS_EVEN = 'Answer "yes" if number even otherwise answer "no".';
const RANDOM_MIN = 0;
const RANDOM_MAX = 100;

function isEven($number)
{
    return $number % 2 === 0 ? true : false;
}

function getAnswer($question)
{
    $answer = isEven($question) ? 'yes' : 'no';
    return $answer;
}

function getRandomNumber()
{
    return rand(RANDOM_MIN, RANDOM_MAX);
}

function play()
{
    $dataAttributes = function () {      
        $question = getRandomNumber();
        $answer = getAnswer($question);

        return [$question, $answer];
    };
    
    gameLogic(GAME_CONDITIONS_EVEN, $dataAttributes);
    return;
}
