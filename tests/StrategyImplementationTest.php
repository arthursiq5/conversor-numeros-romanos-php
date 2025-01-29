<?php

namespace App\Test;

use App\ConversionStrategies\IntegerToRomanStrategy;
use App\ConversionStrategies\RomanToIntegerStrategy;
use App\RomanConverterContext;
use PHPUnit\Framework\TestCase;

class StrategyImplementationTest extends TestCase
{
    public function test_roman_to_int(): void
    {
        $context = new RomanConverterContext(new RomanToIntegerStrategy());
        $this->assertEquals(1, $context->execute('I'));
    }

    public function test_int_to_roman(): void
    {
        $context = new RomanConverterContext(new IntegerToRomanStrategy());
        $this->assertEquals('I', $context->execute(1));
    }
}