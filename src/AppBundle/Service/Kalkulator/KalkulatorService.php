<?php

namespace AppBundle\Service\Kalkulator;

use AppBundle\Service\Kalkulator\Dzialania\Dodawanie;
use AppBundle\Service\Kalkulator\Dzialania\DzialanieInterface;
use AppBundle\Service\Kalkulator\Dzialania\Dzielenie;
use AppBundle\Service\Kalkulator\Dzialania\Mnozenie;
use AppBundle\Service\Kalkulator\Dzialania\Odejmowanie;
use AppBundle\Service\Kalkulator\Stale\Operatory;

class KalkulatorService
{
    public function stworzDzialanie(float $liczba1, string $operator, float $liczba2): DzialanieInterface
    {
        $dzialanie = null;
        switch ($operator){
            case Operatory::DODAWANIE:{
                $dzialanie = new Dodawanie($liczba1, $liczba2);
                break;
            }
            case Operatory::ODEJMOWANIE:{
                $dzialanie = new Odejmowanie($liczba1, $liczba2);
                break;
            }
            case Operatory::MNOZENIE:{
                $dzialanie = new Mnozenie($liczba1, $liczba2);
                break;
            }
            case Operatory::DZIELENIE:{
                $dzialanie = new Dzielenie($liczba1, $liczba2);
                break;
            }
            default:{
                throw new \RuntimeException("Nie znam operatora " . $operator);
            }
        }

        return $dzialanie;
    }
}