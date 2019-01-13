<?php

namespace BrainGames\Games\Progression;

use function \BrainGames\GameLogic\gameLogic;

const DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;

function generateProgression($start, $step, $lenProgression)
{
    $progression = [];
    for ($i = 0; $i < $lenProgression; $i += 1) {
        $progression[] = $start + $step * $i;
    }
    return $progression;
}

function play()
{
    $generateGameData = function () {
        $start = rand(1, 10);
        $step = rand(1, 10);
        $progression = generateProgression($start, $step, PROGRESSION_LENGTH);
        $progressionWithHiddenElement = array_slice($progression, 0);
        $hiddenElementIndex = rand(0, PROGRESSION_LENGTH - 1);
        $progressionWithHiddenElement[$hiddenElementIndex] = '..';
        $question = implode(' ', $progressionWithHiddenElement);
        $answer = $progression[$hiddenElementIndex];
        return [$question, "{$answer}"];
    };

    gameLogic(DESCRIPTION, $generateGameData);
}
