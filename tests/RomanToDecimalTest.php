<?php

namespace App\Test;

use App\Roman;
use PHPUnit\Framework\TestCase;

class RomanToDecimalTest extends TestCase
{
    public function test_is_number_valid()
    {
        $this->assertTrue(Roman::isValidRomanNumber('XX'));
        $this->assertTrue(Roman::isValidRomanNumber('X'));
        $this->assertTrue(Roman::isValidRomanNumber('C'));
        $this->assertFalse(Roman::isValidRomanNumber('ABC'));
        $this->assertFalse(Roman::isValidRomanNumber('VV'));
        $this->assertFalse(Roman::isValidRomanNumber('XIIII'));
        $this->assertFalse(Roman::isValidRomanNumber('VX'));
        $this->assertFalse(Roman::isValidRomanNumber('VIIX'));
        $this->assertFalse(Roman::isValidRomanNumber('DVX'));
    }
    public function test_basic_conversion_to_decimal(): void
    {
        $this->assertEquals(1, Roman::toDecimal('I'));
        $this->assertEquals(2, Roman::toDecimal('II'));
        $this->assertEquals(3, Roman::toDecimal('III'));
        $this->assertEquals(10, Roman::toDecimal('X'));
        $this->assertEquals(20, Roman::toDecimal('XX'));
        $this->assertEquals(30, Roman::toDecimal('XXX'));
    }
    public function test_complex_conversion_to_decimal(): void
    {
        $this->assertEquals(9, Roman::toDecimal('IX'));
        $this->assertEquals(40, Roman::toDecimal('XL'));
        $this->assertEquals(43, Roman::toDecimal('XLIII'));
        $this->assertEquals(19, Roman::toDecimal('XIX'));
        $this->assertEquals(79, Roman::toDecimal('LXXIX'));
    }

    public function test_invalid_conversion_to_decimal(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->assertEquals(0, Roman::toDecimal(''));
        $this->expectException(\InvalidArgumentException::class);
        Roman::toDecimal('VV');
    }
}