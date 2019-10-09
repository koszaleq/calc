<?php

namespace AppBundle\Service\Kalkulator\Dzialania;

interface calcInterface
{
    public function calculate(): float;

    public function isNumbersCorrect(): bool;
}