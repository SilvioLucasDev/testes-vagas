<?php

ask();

function ask()
{
    $age = readline("Insira a sua idade em dias: ");
    echo (is_int(intval($age))) ? calcValues($age) : "Por favor, insira um valor inteiro";
}

function calcValues($age)
{
    $daysYear = 365;
    $daysMonth = 30;

    $years = floor($age / $daysYear); // floor() Arredonda o número para baixo.
    $months = floor(fmod($age, $daysYear) / $daysMonth);
    $days =  fmod(fmod($age, $daysYear), $daysMonth);

    echo "$years ano(s)" . PHP_EOL;
    echo "$months mes(es)" . PHP_EOL;
    echo "$days dia(s)" . PHP_EOL;

    $continue = readline("Deseja calcular novamente? [s/N] ");
    if (strtolower($continue) == "s") {
        ask();
    }
}