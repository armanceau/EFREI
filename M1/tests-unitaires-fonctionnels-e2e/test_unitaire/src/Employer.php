<?php

namespace Arthu\TestUnitaire;

class Employer
{
    private int $matricule;
    private string $nom;
    private float $indiceSalarial;
    private float $multiplicateurSalaire;

    /**
     * @param int $matricule matricule de l'utilisateur020340
     * @param string $nom nom
     * @param float $indiceSalarial indice salarial
     */
    public function __construct(int $matricule, string $nom, float $indiceSalarial)
    {
        $this->matricule = $matricule;
        $this->nom = $nom;
        $this->indiceSalarial = $indiceSalarial;
        $this->multiplicateurSalaire = 10;
    }

    /**     * Cette fonction permet de calculer le salaire de l'employer     * @return float */
    public function salaire(): float
    {
        return $this->multiplicateurSalaire * $this->indiceSalarial;
    }

    /**     * Cette fonctions permet d'afficher l'ensemble des informations de l'employer     * @return void */
    public function details(): string
    {
        return $this->matricule . " " . $this->nom . " " . $this->salaire();
    }
    // get / set
    public function getMatricule(): int
    {
        return $this->matricule;
    }
    public function setMatricule(int $matricule): void
    {
        $this->matricule = $matricule;
    }
    /**     * @return string     */
    public function getNom(): string
    {
        return $this->nom;
    }
    /**     * @param string $nom     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }
    /**     * @return float     */
    public function getIndiceSalarial(): float
    {
        return $this->indiceSalarial;
    }
    /**     * @param float $indiceSalarial     */
    public function setIndiceSalarial(float $indiceSalarial): void
    {
        $this->indiceSalarial = $indiceSalarial;
    }
    /**     * @return float|int     */
    public function getMultiplicateurSalaire()
    {
        return $this->multiplicateurSalaire;
    }
}