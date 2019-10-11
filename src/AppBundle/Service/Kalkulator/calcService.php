<?php

namespace AppBundle\Service\Kalkulator;

use AppBundle\Service\Kalkulator\Dzialania\Dodawanie;
use AppBundle\Service\Kalkulator\Dzialania\calcInterface;
use AppBundle\Service\Kalkulator\Dzialania\Dzielenie;
use AppBundle\Service\Kalkulator\Dzialania\Mnozenie;
use AppBundle\Service\Kalkulator\Dzialania\Odejmowanie;
use AppBundle\Service\Kalkulator\Dzialania\Pierwiastek;
use AppBundle\Service\Kalkulator\Dzialania\Potegowanie;
use AppBundle\Service\Kalkulator\Stale\Operators;

class calcService
{
    public function calcOperator(float $liczba1, string $operator, float $liczba2): calcInterface
    {
        $dzialanie = null;
        switch ($operator){
            case Operators::DODAWANIE:{
                $dzialanie = new Dodawanie($liczba1, $liczba2);
                break;
            }
            case Operators::ODEJMOWANIE:{
                $dzialanie = new Odejmowanie($liczba1, $liczba2);
                break;
            }
            case Operators::MNOZENIE:{
                $dzialanie = new Mnozenie($liczba1, $liczba2);
                break;
            }
            case Operators::DZIELENIE:{
                $dzialanie = new Dzielenie($liczba1, $liczba2);
                break;
            }
            case Operators::PIERWIASTEK:{
                $dzialanie = new Pierwiastek($liczba1);
                break;
            }
            case Operators::POTEGA:{
                $dzialanie = new Potegowanie($liczba1, $liczba2);
                break;
            }
            default:{
                throw new \RuntimeException("Operator nieznany: " . $operator);
            }
        }

        return $dzialanie;
    }
}