<?php

namespace Arthu\TestUnitaire\pokemon;

class Pokemon
{
    // private type $nom;
    private string $nom;
    private int $hp; // point de vie
    private int $atk;

    // constructeur
    public function __construct(string $nom, int $hp, int $atk)
    {
        $this->nom = $nom;
        $this->hp = $hp;
        $this->atk = $atk;
    }

    /**
     * Vérifier si mon pokemon est mort
     * @return bool
     */
    public function isDead() : bool{
        /*if ($this->hp <= 0){
            return true;
        }else{
            return false;
        }*/

        return $this->hp <= 0;
    }

    /**
     * J'attaque ($this) un autre pokemon ($p)
     * @param Pokemon $p
     * @return void
     */
    public function attaquer(Pokemon $p){
        $p->setHp( $p->getHp() - $this->atk );
        //$p->setHp(23); // modifier la valeur
    }

    public function __toString(): string
    {
        return "nom : $this->nom atk : $this->atk hp : $this->hp";
    }


    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return int
     */
    public function getHp(): int
    {
        return $this->hp;
    }

    /**
     * @param int $hp
     */
    public function setHp(int $hp): void
    {
        if($hp <= 0) {
            $hp = 0;
        }
        $this->hp = $hp;
    }

    /**
     * @return int
     */
    public function getAtk(): int
    {
        return $this->atk;
    }

    /**
     * @param int $atk
     */
    public function setAtk(int $atk): void
    {
        $this->atk = $atk;
    }
}