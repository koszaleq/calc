<?php

namespace AppBundle\Service\Kalkulator\Dzialania;

class Pierwiastek implements calcInterface
{
    private $liczba1;


    public function __construct(float $liczba1)
    {
        $this->liczba1 = $liczba1;
    }

    public function calculate(): float
    {
        return (float)sqrt($this->liczba1);
    }

    public function isNumbersCorrect(): bool
    {
        return $this->liczba1 >= 0;
    }
}