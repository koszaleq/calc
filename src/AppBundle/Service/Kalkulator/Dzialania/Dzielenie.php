<?php

namespace AppBundle\Service\Kalkulator\Dzialania;

class Dzielenie implements calcInterface
{
    private $liczba1;

    private $liczba2;

    public function __construct(float $liczba1, float $liczba2)
    {
        $this->liczba1 = $liczba1;
        $this->liczba2 = $liczba2;
    }

    public function calculate(): float
    {
        return (float)$this->liczba1 / $this->liczba2;
    }

    public function isNumbersCorrect(): bool
    {
        return $this->liczba2 > 0 || $this->liczba2 < 0;
    }
}