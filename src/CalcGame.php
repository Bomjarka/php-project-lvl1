<?php

namespace Src\CalcGame;

use function cli\line;
use function cli\prompt;
use function Src\Greeting\greeting;

function calc()
{
    $name = greeting();

    $counter = 0;

    while ($counter <= 2) {
        $operator = getRandomOperator();
        $a = getRandomNumber();
        $b = getRandomNumber();
        $operatorChar = getOperatorChar($operator);
        line('Question: %s %s %s', $a, $operatorChar, $b);
        $answer = prompt('Your answer');
        $expressionResult = getExpressionResult($a, $b, $operator);
        if ($answer == $expressionResult) {
            line('Correct!');
            $counter++;
        } else {
            line('%s is wrong answer ;(. Correct answer was %s', $answer, $expressionResult);
            break;
        }
    }

    if ($counter == 3) {
        line("Congratulations, %s!", $name);
    } else {
        line("Let's try again, %s!", $name);
    }
}

function getRandomNumber()
{
    return rand(1, 100);
}

function getRandomOperator()
{
    $operators = ['addition', 'subtraction', 'multiplication'];
    return $operators[array_rand($operators, 1)];
}

function getOperatorChar($operator)
{
    switch ($operator) {
        case 'addition':
            return '+';
        case 'subtraction':
            return '-';
        case 'multiplication':
            return '*';
    }
}

function getExpressionResult($a, $b, $operator)
{
    switch ($operator) {
        case 'addition':
            return $a + $b;
        case 'subtraction':
            return $a - $b;
        case 'multiplication':
            return $a * $b;
    }
}
