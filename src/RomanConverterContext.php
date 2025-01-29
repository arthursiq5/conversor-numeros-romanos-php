<?php

namespace App;

use App\ConversionStrategies\ConversionStrategyInterface;

class RomanConverterContext
{
    private ConversionStrategyInterface $strategy;

    public function __construct(ConversionStrategyInterface $strategy = null)
    {
        $this->strategy = $strategy;
    }

    public function setStrategy(ConversionStrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    public function execute($input)
    {
        return $this->strategy->convert($input);
    }
}