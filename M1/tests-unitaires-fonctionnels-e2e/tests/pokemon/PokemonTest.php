<?php


use Arthu\TestUnitaire\pokemon\Pokemon;
use PHPUnit\Framework\TestCase;

class PokemonTest extends TestCase
{
    public function testConstructeur(){
        $pokemon = new Pokemon("noemie", 50, 20);
        $this->assertEquals("noemie", $pokemon->getNom());
        $this->assertEquals(50, $pokemon->getHp());
        $this->assertEquals(20, $pokemon->getAtk());

        $pokemon->setNom("rayane");
        $this->assertEquals("rayane", $pokemon->getNom());
        $pokemon->setHp(50);
        $this->assertEquals(50, $pokemon->getHp());
        $pokemon->setAtk(20);
        $this->assertEquals(20, $pokemon->getAtk());
    }

    public function testAttaquer(){
        $pokemon = new Pokemon("noemie", 50, 20);
        $pokemon2 = new Pokemon("rayane", 100, 50);
        $pokemon->attaquer($pokemon2);
        $this->assertEquals(80, $pokemon2->getHp());
    }

    public function testIsDead(){
        $pokemon = new Pokemon("noemie", 50, 20);
        $pokemon2 = new Pokemon("rayane", 100, 50);
        $pokemon2->attaquer($pokemon);
        $this->assertTrue($pokemon->isDead());
    }

    public function testToString(){
        $pokemon = new Pokemon("noemie", 50, 20);
        $this->assertEquals("nom : noemie atk : 20 hp : 50", $pokemon->__toString());
    }

}
