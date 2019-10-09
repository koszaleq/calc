<?php

namespace AppBundle\Service\Kalkulator\Walidator;

interface WalidatorInterface
{
    public function waliduj(int $liczba): bool;
}