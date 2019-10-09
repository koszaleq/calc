<?php

namespace AppBundle\Service\Kalkulator\Dzialania;

class Mnozenie implements DzialanieInterface
{
    private $liczba1;

    private $liczba2;

    public function __construct(float $liczba1, float $liczba2)
    {
        $this->liczba1 = $liczba1;
        $this->liczba2 = $liczba2;
    }

    public function oblicz(): float
    {
        return (float)$this->liczba1 * $this->liczba2;
    }

    public function czyLiczbySaPoprawne(): bool
    {
        return true;
    }
}