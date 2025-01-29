<?php

namespace App\ConversionStrategies;

use App\NumericConstants;
use App\Validators\RomanNumberValidator;

class RomanToIntegerStrategy implements ConversionStrategyInterface
{
    /**
     * convert a number to other format
     * @var string
     * @return int
     */
    public function convert($romanNumber)
    {
        $number = 0;
        if (!(new RomanNumberValidator($romanNumber))->isValid()) {
            throw new \InvalidArgumentException("O número romano fornecido é inválido.");
        };
        foreach (NumericConstants::ROMAN_NUMERALS as $key => $character) {
            while (strpos($romanNumber, $character) === 0) {
                $number += NumericConstants::ARABIC_NUMERALS[$key];
                $romanNumber = substr($romanNumber, strlen($character));
            }
            if ($romanNumber == '') {
                break;
            }

        }
        return $number;
    }
}