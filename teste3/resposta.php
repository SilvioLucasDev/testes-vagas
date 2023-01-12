<?php

ask();

function ask()
{
    $countTest = readline("Insira a quantidade de testes: ");
    echo ($countTest >= 0 && $countTest <= 10000) ? calcOperations($countTest) : "Por favor, insira um valor maior que 0 e menor que 10.000";
}

function calcOperations($countTest)
{
    function mcd($numerator, $denominator)
    {
        return $denominator ? mcd($denominator, $numerator % $denominator) : $numerator;
    }

    for ($i = 0; $i < $countTest; $i++) {
        $opList = explode(" ", readline('Insira a operação: '));

        $numbers = array();
        $numbers['n1'] = $opList[0];
        $numbers['d1'] = $opList[2];
        $numbers['n2'] = $opList[4];
        $numbers['d2'] = $opList[6];

        foreach ($numbers as $number) {
            if ($number < 1 || $number > 1000) {
                echo "O valor $number está fora do intervalo de 1 a 1000" . PHP_EOL;
                exit;
            }
        }

        switch ($opList[3]) {
            case '+':
                $numerator = ($numbers['n1'] * $numbers['d2'] + $numbers['n2'] * $numbers['d1']);
                $denominator = ($numbers['d1'] * $numbers['d2']);
                break;

            case '-':
                $numerator = ($numbers['n1'] * $numbers['d2'] - $numbers['n2'] * $numbers['d1']);
                $denominator = ($numbers['d1'] * $numbers['d2']);
                break;

            case '*':
                $numerator = ($numbers['n1'] * $numbers['n2']);
                $denominator = ($numbers['d1'] * $numbers['d2']);
                break;

            case '/':
                $numerator = ($numbers['n1'] * $numbers['d2']);
                $denominator = ($numbers['n2'] * $numbers['d1']);
                break;

            default:
                echo "Você inseriu um operador inválido";
                exit;
        }

        $divider = mcd($numerator, $denominator);
        $numeratorSimpl = $numerator / $divider;
        $denominatorSimpl = $denominator / $divider;

        echo "$numerator/$denominator = $numeratorSimpl/$denominatorSimpl" . PHP_EOL;
    }

    $continue = readline("Deseja calcular novamente? [s/N] ");
    if (strtolower($continue) == "s") {
        ask();
    }
}