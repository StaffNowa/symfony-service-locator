<?php

namespace App\Util;

class CalculatorUtil implements CalculatorUtilInterface
{
    public function sum(int $a, int $b): int
    {
        return $a + $b;
    }
}
