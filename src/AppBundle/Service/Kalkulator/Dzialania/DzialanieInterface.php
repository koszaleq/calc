<?php

namespace AppBundle\Service\Kalkulator\Dzialania;

interface DzialanieInterface
{
    public function oblicz(): float;

    public function czyLiczbySaPoprawne(): bool;
}