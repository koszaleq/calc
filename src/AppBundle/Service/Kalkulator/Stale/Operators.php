<?php

namespace AppBundle\Service\Kalkulator\Stale;

class Operators
{
    const DODAWANIE = '+';

    const ODEJMOWANIE = '-';

    const MNOZENIE = '*';

    const DZIELENIE = '/';

    const PIERWIASTEK = '√';

    const POTEGA = '^';

    public static function getOperator(): array
    {
        return [
            self::DODAWANIE,
            self::ODEJMOWANIE,
            self::MNOZENIE,
            self::DZIELENIE,
            self::PIERWIASTEK,
            self::POTEGA
        ];
    }
}