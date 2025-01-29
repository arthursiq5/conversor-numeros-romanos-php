<?php

namespace App;

class NumericConstants
{
    const ROMAN_NUMERALS = ["M", "CM", "D", "CD", "C", "XC", "L", "XL", "X", "IX", "V", "IV", "I"];
    const ARABIC_NUMERALS = [1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1];

    public const GREEK_NUMERALS = [
        900 => 'ϡ',  // Sampi
        800 => 'ω',  // Omega
        700 => 'ψ',  // Psi
        600 => 'χ',  // Khi
        500 => 'φ',  // Phi
        400 => 'υ',  // Upsilon
        300 => 'τ',  // Tau
        200 => 'σ',  // Sigma
        100 => 'ρ',  // Rho
        90  => 'ϙ',  // Koppa
        80  => 'π',  // Pi
        70  => 'ο',  // Omicron
        60  => 'ξ',  // Xi
        50  => 'ν',  // Nu
        40  => 'μ',  // Mu
        30  => 'λ',  // Lambda
        20  => 'κ',  // Kappa
        10  => 'ι',  // Iota
        9   => 'θ',  // Theta
        8   => 'η',  // Eta
        7   => 'ζ',  // Zeta
        6   => 'ϝ',  // Digamma
        5   => 'ε',  // Epsilon
        4   => 'δ',  // Delta
        3   => 'γ',  // Gama
        2   => 'β',  // Beta
        1   => 'α',  // Alfa
    ];
}