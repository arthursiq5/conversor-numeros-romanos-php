<?php

namespace App\ConversionStrategies;

use App\NumericConstants;

class IntegerToGreekStrategy implements ConversionStrategyInterface
{
    public function convert($number): string
    {
        if ($number <= 0) {
            throw new \InvalidArgumentException("O número deve ser positivo para conversão para grego.");
        }

        $greek = '';

        foreach (NumericConstants::GREEK_NUMERALS as $value => $letter) {
            while ($number >= $value) {
                $greek .= $letter;
                $number -= $value;
            }
        }

        return $greek;
    }
}
