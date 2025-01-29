<?php

namespace App\ConversionStrategies;

use App\NumericConstants;

class IntegerToRomanStrategy implements ConversionStrategyInterface
{

    /**
     * convert a number to other format
     * @return string|int
     */
    public function convert($number)
    {
        if ($number < 0) throw new \InvalidArgumentException('Negative numbers are off interval');
        $number = intval($number);
        
        $roman = '';
        $currentIndex = 0;

        while (sizeof(NumericConstants::ARABIC_NUMERALS) > $currentIndex) {
            if ($number % NumericConstants::ARABIC_NUMERALS[$currentIndex] == $number) {
                $currentIndex++;
                continue;
            }
            $roman .= NumericConstants::ROMAN_NUMERALS[$currentIndex];
            $number -= NumericConstants::ARABIC_NUMERALS[$currentIndex];
            if ($number == 0) break;
        }

        return $roman;
    }
}