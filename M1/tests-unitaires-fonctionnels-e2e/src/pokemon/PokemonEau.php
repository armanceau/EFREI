<?php
namespace Arthu\TestUnitaire\pokemon;

class PokemonEau extends Pokemon
{

    public function __construct(string $nom, int $hp, int $atk)
    {
        parent::__construct($nom, $hp, $atk);
    }

    public function attaquer(Pokemon $p)
    {
        if ($p instanceof PokemonFeu){
            $p->setHp( $p->getHp() - parent::getAtk() * 2 );
        }else if ($p instanceof PokemonPlante){
            $p->setHp( $p->getHp() - parent::getAtk() / 2 );
        }else{
            // les deux pokemon ils sont de même type
            parent::attaquer($p);
        }
    }
}