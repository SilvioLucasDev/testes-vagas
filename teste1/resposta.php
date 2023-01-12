<?php

ask();

function ask()
{
    $value = readline("Insira o valor a ser calculado: ");
    echo ($value >= 0 && $value <= 1000000.00) ? calcValues($value) : "Por favor, insira um valor maior que R$ 0 e menor que R$ 1.000.000.00";
}

function calcValues($value)
{
    $notes = [100, 50, 20, 10, 5, 2];
    $coins = [1, 0.50, 0.25, 0.10, 0.05, 0.01];

    echo "NOTAS:" . PHP_EOL;
    foreach ($notes as $nota) {
        $notesCount = intval($value / $nota); // intval() Transforma o resultado em um inteiro.
        $value = fmod($value, $nota); // fmod() Retorna o resto da divisião.
        echo "$notesCount nota(s) de R$ $nota" . PHP_EOL;
    }

    echo PHP_EOL . "MOEDAS:" . PHP_EOL;
    foreach ($coins as $coin) {
        $coinsCount = intval($value / $coin);
        $value = fmod($value, $coin);
        echo "$coinsCount moedas(s) de R$ $coin" . PHP_EOL;
    }

    $continue = readline("Deseja calcular novamente? [s/N] ");
    if (strtolower($continue) == "s") {
        ask();
    }
}