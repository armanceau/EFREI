<?php

namespace Arthu\TestUnitaire;

use PHPUnit\Framework\Exception;

class Calculator
{
    public function add(int $a, int $b)
    {
        return $a + $b;
    }
    public function substract(int $a, int $b)
    {
        return $a - $b;
    }

    public function divide(int $a, int $b)
    {
        if($a == 0 || $b == 0){
            throw new \Exception("Division by zero");
        }
        return $a / $b;
    }

    public function multiply(int $a, int $b)
    {
        return $a * $b;
    }
}