<?php

namespace Arthu\TestUnitaire\pokemon;

use PHPUnit\Framework\TestCase;

class PokemonFeuTest extends TestCase
{
    public function testAttaquerPokemonPlante(){
        $pokemon = new PokemonPlante("noemie", 120, 20);
        $pokemon2 = new PokemonFeu("rayane", 100, 50);
        $pokemon2->attaquer($pokemon);
        $this->assertEquals(20, $pokemon->getHp());
    }

    public function testAttaquerPokemonEau(){
        $pokemon = new PokemonEau("noemie", 120, 20);
        $pokemon2 = new PokemonFeu("rayane", 100, 40);
        $pokemon2->attaquer($pokemon);
        $this->assertEquals(100, $pokemon->getHp());
    }

    public function testAttaquerPokemonFeu(){
        $pokemon = new PokemonFeu("noemie", 120, 20);
        $pokemon2 = new PokemonFeu("rayane", 100, 40);
        $pokemon2->attaquer($pokemon);
        $this->assertEquals(80, $pokemon->getHp());
    }
}
