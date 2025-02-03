<?php

namespace Arthu\tests;

use Arthu\TestUnitaire\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testAdd(){
        $calculator = new Calculator();
        $this->assertEquals(4, $calculator->add(2, 2));
        $this->assertEquals(22, $calculator->add(20, 2));
    }

    public function testSubstract(){
        $calculator = new Calculator();
        $this->assertEquals(4, $calculator->substract(6, 2));
    }

    public function testMultiply(){
        $calculator = new Calculator();
        $this->assertEquals(8, $calculator->multiply(2, 4));
    }

    public function testDivide(){
        $calculator = new Calculator();
        $this->assertEquals(5, $calculator->divide(10, 2));
    }

    public function testDivideByZero(){
        $calculator = new Calculator();
        $this->assertEquals('Division by zero', $calculator->divide(0, 2));
    }
}