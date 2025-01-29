<?php

namespace App\Test;

use App\ConversionStrategies\RomanToIntegerStrategy;
use PHPUnit\Framework\TestCase;

class RomanToDecimalTest extends TestCase
{
    private RomanToIntegerStrategy $converter;

    protected function setUp(): void
    {
        $this->converter = new RomanToIntegerStrategy();
    }
    
    public function test_basic_conversion_to_decimal(): void
    {
        $this->assertEquals(1, $this->converter->convert('I'));
        $this->assertEquals(2, $this->converter->convert('II'));
        $this->assertEquals(3, $this->converter->convert('III'));
        $this->assertEquals(10, $this->converter->convert('X'));
        $this->assertEquals(20, $this->converter->convert('XX'));
        $this->assertEquals(30, $this->converter->convert('XXX'));
    }
    public function test_complex_conversion_to_decimal(): void
    {
        $this->assertEquals(9, $this->converter->convert('IX'));
        $this->assertEquals(40, $this->converter->convert('XL'));
        $this->assertEquals(43, $this->converter->convert('XLIII'));
        $this->assertEquals(19, $this->converter->convert('XIX'));
        $this->assertEquals(79, $this->converter->convert('LXXIX'));
    }

    public function test_unormalized_roman_number(): void
    {
        $this->assertEquals(4, $this->converter->convert('iv'));
        $this->assertEquals(19, $this->converter->convert(' xi x'));
        $this->assertEquals(43, $this->converter->convert(' X l IiI '));
    }

    public function test_invalid_conversion_to_decimal(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->converter->convert('');
        $this->expectException(\InvalidArgumentException::class);
        $this->converter->convert('');
    }
}