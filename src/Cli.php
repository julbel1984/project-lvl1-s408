<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

const CORRECT_ANSWER = 3;

function welcome()
{
    line("Welcome to the Brain Game! \n");
    $name = prompt("May I have your name?");
    line("Hello, {$name}!");
}

function gameLogic($gameConditionsEven, $dataAttributes)
{
    line("Welcome to the Brain Game! \n");
    line($gameConditionsEven);
    $name = prompt("May I have your name?");
    line("Hello, {$name}!");
    
    for ($i = 1; $i <= CORRECT_ANSWER; $i += 1) {
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

    return line("Congratulations, {$name}!");
}
