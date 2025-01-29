<?php

namespace App\Test;

use App\ConversionStrategies\IntegerToRomanStrategy;
use PHPUnit\Framework\TestCase;

class DecimalToRomanTest extends TestCase
{
    private IntegerToRomanStrategy $converter;

    protected function setUp(): void
    {
        $this->converter = new IntegerToRomanStrategy();
    }

    /**
     * @dataProvider romanNumberProvider
     */
    public function test_converting_to_roman(): void
    {
        $data = self::romanNumberProvider();
        foreach($data as $item) {
            $converted = $item[0];
            $expected = $item[1];
            $this->assertEquals($expected, $this->converter->convert($converted));
        }
    }

    public static function romanNumberProvider(): array
    {
        return [
            '1 -> I' => [1, 'I'],
            '2 -> II' => [2, 'II'],
            '3 -> III' => [3, 'III'],
            '4 -> IV' => [4, 'IV'],
            '5 -> V' => [5, 'V'],
            '6 -> VI' => [6, 'VI'],
            '7 -> VII' => [7, 'VII'],
            '8 -> VIII' => [8, 'VIII'],
            '9 -> IX' => [9, 'IX'],
            '10 -> X' => [10, 'X'],
            '11 -> XI' => [11, 'XI'],
            '12 -> XII' => [12, 'XII'],
            '22 -> XXII' => [22, 'XXII'],
            '40 -> XL' => [40, 'XL'],
            '44 -> XLIV' => [44, 'XLIV'],
            '50 -> L' => [50, 'L'],
            '90 -> XC' => [90, 'XC'],
            '100 -> C' => [100, 'C'],
            '149 -> CXLIX' => [149, 'CXLIX'],
            '400 -> CD' => [400, 'CD'],
            '500 -> D' => [500, 'D'],
            '900 -> CM' => [900, 'CM'],
            '1000 -> M' => [1000, 'M'],
            '1999 -> MCMXCIX' => [1999, 'MCMXCIX'],
            '2024 -> MMXXIV' => [2024, 'MMXXIV'],
            '3447 -> MMMCDXLVII' => [3447, 'MMMCDXLVII'],
            '3999 -> MMMCMXCIX' => [3999, 'MMMCMXCIX'], // Maior número válido
        ];
    }

    public function test_invalid_numbers_throw_exception(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->converter->convert(-1);
    }
}
