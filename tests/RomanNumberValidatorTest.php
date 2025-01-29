<?php

namespace App\Test;

use App\Validators\RomanNumberValidator;
use PHPUnit\Framework\TestCase;

class RomanNumberValidatorTest extends TestCase
{
    public function test_is_number_valid()
    {
        $this->assertTrue((new RomanNumberValidator('XX'))->isValid());
        $this->assertTrue((new RomanNumberValidator('X'))->isValid());
        $this->assertTrue((new RomanNumberValidator('C'))->isValid());
        $this->assertFalse((new RomanNumberValidator('ABC'))->isValid());
        $this->assertFalse((new RomanNumberValidator('VV'))->isValid());
        $this->assertFalse((new RomanNumberValidator('XIIII'))->isValid());
        $this->assertFalse((new RomanNumberValidator('VX'))->isValid());
        $this->assertFalse((new RomanNumberValidator('VIIX'))->isValid());
        $this->assertFalse((new RomanNumberValidator('DVX'))->isValid());
    }
}