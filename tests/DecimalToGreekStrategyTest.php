<?php

namespace App\Test;

use App\ConversionStrategies\IntegerToGreekStrategy;
use PHPUnit\Framework\TestCase;

class DecimalToGreekStrategyTest extends TestCase
{
    private IntegerToGreekStrategy $converter;

    protected function setUp(): void
    {
        $this->converter = new IntegerToGreekStrategy();
    }

    /**
     * @test Converte números pequenos corretamente.
     */
    public function test_converts_small_numbers_correctly()
    {
        $this->assertEquals('α', $this->converter->convert(1)); // Alfa
        $this->assertEquals('β', $this->converter->convert(2)); // Beta
        $this->assertEquals('γ', $this->converter->convert(3)); // Gama
        $this->assertEquals('ε', $this->converter->convert(5)); // Epsilon
    }

    /**
     * @test Converte dezenas corretamente.
     */
    public function test_converts_tens_correctly()
    {
        $this->assertEquals('ι', $this->converter->convert(10)); // Iota
        $this->assertEquals('κ', $this->converter->convert(20)); // Kappa
        $this->assertEquals('λ', $this->converter->convert(30)); // Lambda
        $this->assertEquals('π', $this->converter->convert(80)); // Pi
    }

    /**
     * @test Converte centenas corretamente.
     */
    public function test_converts_hundreds_correctly()
    {
        $this->assertEquals('ρ', $this->converter->convert(100)); // Rho
        $this->assertEquals('σ', $this->converter->convert(200)); // Sigma
        $this->assertEquals('τ', $this->converter->convert(300)); // Tau
    }

    /**
     * @test Converte números compostos corretamente.
     */
    public function test_converts_composite_numbers_correctly()
    {
        $this->assertEquals('ρκγ', $this->converter->convert(123)); // Rho + Kappa + Gama
        $this->assertEquals('πζ', $this->converter->convert(87));  // Pi + Zeta
        $this->assertEquals('λθ', $this->converter->convert(39));  // Lambda + Theta
    }

    /**
     * @test Converte números grandes corretamente.
     */
    public function test_converts_large_numbers_correctly()
    {
        $this->assertEquals('φξα', $this->converter->convert(561)); // Phi + Xi + Alfa
        $this->assertEquals('ϡϙθ', $this->converter->convert(999)); // Sampi + Koppa + Theta
    }

    /**
     * @test Lança exceção para números negativos.
     */
    public function test_throws_exception_for_negative_numbers()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->converter->convert(-5);
    }

    /**
     * @test Lança exceção para zero.
     */
    public function test_throws_exception_for_zero()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->converter->convert(0);
    }
}