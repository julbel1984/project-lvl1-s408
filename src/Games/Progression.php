<?php

namespace BrainGames\Games\Progression;

use function \BrainGames\GameLogic\gameLogic;

const DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;
const NUMBER_MIN = 1;
const NUMBER_MAX = 100;
const NUMBER_MIN_STEP = 1;
const NUMBER_MAX_STEP = 10;
const INDEX_HIDDEN = 2;

function getArray()
{
    $start = rand(NUMBER_MIN, NUMBER_MAX);
    $step = rand(NUMBER_MIN_STEP, NUMBER_MAX_STEP);
    $end = $start + (PROGRESSION_LENGTH * $step - 1);
    return range($start, $end, $step);
}

function play()
{
    $generateGameData = function () {
        $progression = getArray();
        $answer = $progression[INDEX_HIDDEN];
        $progression[INDEX_HIDDEN] = "..";
        $progression = implode(' ', $progression);
        $question = (string) $progression;
        $answer = (string) $answer;
        return [$question, $answer];
    };
    
    gameLogic(DESCRIPTION, $generateGameData);
}
