<?php

namespace Src\EvenGame;

use function cli\line;
use function cli\prompt;

function even()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    $counter = 0;

    while ($counter <= 2) {
        $number = rand(1, 100);
        line('Answer "yes" if the number is even, otherwise answer "no".');
        line('Question: %s', $number);
        $answer = prompt('Your answer');
        if (isEven($number) == true) {
            if ($answer == 'yes') {
                line('Correct');
                $counter++;
            } else {
                line('Answer %s if the number is even, otherwise answer "no"', $answer);
                break;
            }
        } elseif (isEven($number) == false) {
            if ($answer == 'no') {
                line('Correct');
                $counter++;
            } else {
                line('Answer %s if the number is even, otherwise answer "no"', $answer);
                break;
            }
        }
    }

    if ($counter == 3) {
        line("Congratulations, %s!", $name);
    } else {
        line("Let's try again, %s!", $name);
    }
}

function isEven($number)
{
    if ($number % 2 == 0) {
        return true;
    } else {
        return false;
    }
}
