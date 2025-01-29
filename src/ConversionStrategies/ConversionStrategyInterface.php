<?php

namespace App\ConversionStrategies;

interface ConversionStrategyInterface
{
    /**
     * convert a number to other format
     * @var string|int $number
     * @return string|int
     */
    public function convert($number);
}