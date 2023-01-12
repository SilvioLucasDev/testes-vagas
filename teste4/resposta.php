<?php

ask();

function ask()
{
    $countStudents = readline("Insira a quantidade de alunos que foram a aula: ");
    calcRoute($countStudents);
}

function calcRoute($countStudents)
{
    for ($i = 0; $i < $countStudents; $i++) {
        $infoList = explode(" ", readline('Insira as informações do(s) aluno(s): '));

        $studentsList[] =  array("name" => $infoList[0], "region" => $infoList[1], "cost" => $infoList[2]);
    }

    usort($studentsList, function ($a, $b) {
        if ($a['cost'] == $b['cost']) {
            if ($a['region'] == $b['region']) {
                return strcmp($a['name'], $b['name']);
            }
            return strcmp($a['region'], $b['region']);
        }
        return $a['cost'] - $b['cost'];
    });

    foreach ($studentsList as $student) {
        echo $student['name'], PHP_EOL;
    }

    $continue = readline("Deseja calcular novamente? [s/N] ");
    if (strtolower($continue) == "s") {
        ask();
    }
}