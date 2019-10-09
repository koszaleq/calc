<?php

namespace AppBundle\Service\Kalkulator\Parser;

use AppBundle\Service\Kalkulator\Stale\Operatory;

class Parser
{
    public function parsuj(string $ciagZnakow): array
    {
        $operator = $this->znajdzOperator($ciagZnakow);

        if($operator === null){
            throw new \RuntimeException('Niedozwolony operator. Dozwolone są tylko: ' . implode(' ', Operatory::pobierzOperatory()));
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

    private function znajdzOperator(string $ciagZnakow)
    {
        $znak = null;
        foreach (Operatory::pobierzOperatory() as $operator){
            if(strpos($ciagZnakow, $operator)){
                $znak = $operator;
                break;
            }
        }

        return $znak;
    }
}