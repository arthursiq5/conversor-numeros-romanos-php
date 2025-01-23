<?php

namespace App;

class Roman
{

    const romansAlgarism = ["M", "CM", "D", "CD", "C", "XC", "L", "XL", "X", "IX", "V", "IV", "I"];
    const arabicsAlgarism = [1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1];

    public static function isValidRomanNumber(string $number): bool
    {
        if ($number == '') return false;
        $pattern = implode("|", self::romansAlgarism);
        $remaining = preg_replace("/($pattern)/i","", $number);
        return $remaining === '';
    }

    public static function toDecimal(string $romanNumber): int {
        $number = 0;
        if (!self::isValidRomanNumber($romanNumber)) return $number;
        foreach (self::romansAlgarism as $key => $character) {
            while (strpos($romanNumber, $character) === 0) {
                $number += self::arabicsAlgarism[$key];
                $romanNumber = substr($romanNumber, strlen($character));
            }
            if ($romanNumber == '') {
                break;
            }

        }
        return (int) $number;
    }
}