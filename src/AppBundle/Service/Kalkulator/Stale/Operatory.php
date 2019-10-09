<?php

namespace AppBundle\Service\Kalkulator\Stale;

class Operatory
{
    const DODAWANIE = '+';

    const ODEJMOWANIE = '-';

    const MNOZENIE = '*';

    const DZIELENIE = '/';

    public static function pobierzOperatory(): array
    {
        return [
            self::DODAWANIE,
            self::ODEJMOWANIE,
            self::MNOZENIE,
            self::DZIELENIE
        ];
    }
}