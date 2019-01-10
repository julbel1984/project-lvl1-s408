<?php

namespace BrainGames\GameLogic;

use function \cli\line;
use function \cli\prompt;

const ATTEMPT = 3;

function gameLogic($gameDescription, $dataAttributes)
{
    line("Welcome to the Brain Game! \n");
    line($gameDescription);
    $name = prompt("May I have your name?");
    line("Hello, {$name}!");

    for ($i = 1; $i <= ATTEMPT; $i += 1) {
        [$question, $answer] = $dataAttributes();
        
        line("Question: {$question}");
        $currentAnswer = prompt("Your answer");
        
        if ($currentAnswer === $answer) {
            line("Correct!");
            continue;
        } else {
            line("'{$currentAnswer}' is wrong answer ;(. Correct answer was '{$answer}'");
            line("Let`s try again, {$name}!");
            return;
        }
    }

    line("Congratulations, {$name}!");
}
