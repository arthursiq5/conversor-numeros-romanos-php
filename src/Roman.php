<?php

namespace App;

class Roman
{

    const romansAlgarism = ["M", "CM", "D", "CD", "C", "XC", "L", "XL", "X", "IX", "V", "IV", "I"];
    const arabicsAlgarism = [1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1];

    public static function isValidRomanNumber(string $number): bool
    {
        if ($number == '') return false;
        $invalidPattern = '/IL|IC|ID|IM|VX|IIX|VL|VC|VD|VM|LC|LD|LM|DM|IIII|VV|LL|DD/i';
        if (preg_match($invalidPattern, $number) === 1) return false;
        $validPattern = '/^[MDCLXVI]+$/i';
        return preg_match($validPattern, $number) === 1;
    }

    public static function toDecimal(string $romanNumber): int {
        $number = 0;
        if (!self::isValidRomanNumber($romanNumber)) {
            throw new \InvalidArgumentException("O número romano fornecido é inválido.");
        };
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