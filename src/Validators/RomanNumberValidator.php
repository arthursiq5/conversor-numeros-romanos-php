<?php

namespace App\Validators;

class RomanNumberValidator
{
    private string $romanNumber;

    public function __construct(string $romanNumber)
    {
        $this->romanNumber = $romanNumber;
    }

    public function isValid(): bool
    {
        if ($this->romanNumber == '') return false;
        $invalidPattern = '/IL|IC|ID|IM|VX|IIX|VL|VC|VD|VM|LC|LD|LM|DM|IIII|VV|LL|DD/i';
        if (preg_match($invalidPattern, $this->romanNumber) === 1) return false;
        $validPattern = '/^[MDCLXVI]+$/i';
        return preg_match($validPattern, $this->romanNumber) === 1;
    }
}