<?php

namespace BrainGames\Games\Progression;

use function \BrainGames\GameLogic\gameLogic;

const DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;

function generateProgression($start, $step, $progressionLength)
{
    $progression[1] = $start;

    $start = rand(1, 10);
    $step = rand(1, 10);
    
    for ($i = 1; $i <= $progressionLength; $i += 1) {
        $progression[$i + 1] = $progression[$i] + $step;
    }
    return $progression;
}

function play()
{
    $generateGameData = function () {              
        $progression = generateProgression(1, 10, PROGRESSION_LENGTH);
        $hiddenIndex = rand(0, PROGRESSION_LENGTH);
        $answer = $progression[$hiddenIndex];
        $progression[$hiddenIndex] = '..';
        $question = implode(' ', $progression);
        $answer = (string) ($answer);
        return [$question, $answer];
       
    };
    
    gameLogic(DESCRIPTION, $generateGameData);
}
