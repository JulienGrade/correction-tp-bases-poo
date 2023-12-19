<?php


class Fruits
{
    private string $nom;
    private int $poids;
    private int $prix;

    public const POMME = "pomme";
    public const CERISE = "cerise";

    public const POMMEIMG = "apple.png";
    public const CHERRYIMG = "cherry.png";

    public function __construct($nom,$poids){
        $this->nom = $nom;
        $this->poids = $poids;
        $this->prix = $this->getPrixFruits($nom);
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    private function getPrixFruits($nom): int
    {
        if($nom === self::POMME){
            return 15;
        }
        return 20;
    }

    public function __toString(){
        $affichage = $this->getAffichageIMG();
        $affichage .= "Nom : " . $this->nom . "<br />";
        $affichage .= "Poids : " . $this->poids . "<br />";
        $affichage .= "Prix : " . $this->prix . "<br />";
        return $affichage;
    }

    private function getAffichageIMG(): string
    {
        if($this->nom === self::POMME){
            return "<img src ='assets/img/".self::POMMEIMG."' alt='image pomme' /> <br/>";
        }

        return "<img src ='assets/img/".self::CHERRYIMG."' alt='image cerise' /><br/>";
    }
}