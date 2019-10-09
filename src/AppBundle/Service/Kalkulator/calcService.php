<?php

namespace AppBundle\Service\Kalkulator;

use AppBundle\Service\Kalkulator\Dzialania\Dodawanie;
use AppBundle\Service\Kalkulator\Dzialania\calcInterface;
use AppBundle\Service\Kalkulator\Dzialania\Dzielenie;
use AppBundle\Service\Kalkulator\Dzialania\Mnozenie;
use AppBundle\Service\Kalkulator\Dzialania\Odejmowanie;
use AppBundle\Service\Kalkulator\Dzialania\Pierwiastek;
use AppBundle\Service\Kalkulator\Stale\Operatory;

class calcService
{
    public function stworzDzialanie(float $liczba1, string $operator, float $liczba2): calcInterface
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
            case Operatory::PIERWIASTEK:{
                $dzialanie = new Pierwiastek($liczba1);
                break;
            }
            default:{
                throw new \RuntimeException("Operator nieznany: " . $operator);
            }
        }

        return $dzialanie;
    }
}