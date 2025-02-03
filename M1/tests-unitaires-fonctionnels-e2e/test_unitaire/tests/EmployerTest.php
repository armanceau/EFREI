<?php

namespace Arthu\tests;

use Arthu\TestUnitaire\Employer;
use PHPUnit\Framework\TestCase;

class EmployerTest extends TestCase
{
    public function testConstructeur()
    {
        $employer = new Employer(123, "arthur", 10);
        $this->assertEquals(123, $employer->getMatricule());
        $this->assertEquals("arthur", $employer->getNom());
        $this->assertEquals(100, $employer->salaire());
        $employer->setMatricule(456);
        $this->assertEquals(456,  $employer->getMatricule());
        $employer->setNom("axelle");
        $this->assertEquals("axelle",  $employer->getNom());
        $employer->setIndiceSalarial(1000);
        $this->assertEquals(1000,  $employer->getIndiceSalarial());
    }

    public function testSalaire(){
        $employer = new Employer(123, "arthur", 20);
        $this->assertEquals(200,  $employer->salaire());
    }

    public function testDetails(){
        $employer = new Employer(123, "arthur", 20);
        $this->assertEquals("123 arthur 200",  $employer->details());
    }
}