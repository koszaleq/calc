<?php

namespace AppBundle\Service\Kalkulator\Parser;

use AppBundle\Service\Kalkulator\Stale\Operators;

class Parser
{
    public function parse(string $ciagZnakow): array
    {
        $operator = $this->findOperator($ciagZnakow);

        if($operator === null){
            throw new \RuntimeException('Błędna składnia bądź niedozwolony operator. Dozwolone są tylko symbole: ' . implode(' ', Operators::getOperator()));
        }

        $liczby = explode($operator, $ciagZnakow);

        $liczba1 = (float)$liczby[0];
        $liczba2 = (float)$liczby[1];

        if(!is_float($liczba1)){
            throw new \RuntimeException('Liczba ' . $liczba1 . ' nie jest prawidłową liczbą');
        }

        if(!is_float($liczba2)){
            throw new \RuntimeException('Liczba ' . $liczba2 . ' nie jest prawidłową liczbą');
        }

        return [$liczba1, $operator, $liczba2];
    }

    private function findOperator(string $ciagZnakow)
    {
        $znak = null;
        foreach (Operators::getOperator() as $operator){
            if(strpos($ciagZnakow, $operator)){
                $znak = $operator;
                break;
            }
        }

        return $znak;
    }
}