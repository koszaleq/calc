<?php

namespace AppBundle\Service\Kalkulator\Walidator;

use AppBundle\Service\Kalkulator\Dzialania\DzialanieInterface;

class Walidator implements WalidatorInterface
{
    public function waliduj(int $liczba): bool
    {
        $czyLiczbaPoprawna = false;

        return $czyLiczbaPoprawna;
    }
}