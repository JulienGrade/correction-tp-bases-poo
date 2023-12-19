<?php
require_once 'Fruits.php';

class Panier{
    private static int $prochainIdentifiant = 1;

    private int $identifiant;
    private array $pommes = [];
    private array $cerises = [];

    public function __construct(){
        $this->identifiant = self::$prochainIdentifiant;
        self::$prochainIdentifiant ++;
    }

    public function getIdentifiant(): int
    {
        return $this->identifiant;
    }

    public function addFruit($fruit): void
    {
        if($fruit->getNom() === Fruits::POMME){
            $this->pommes[] = $fruit;
        } else if($fruit->getNom() === Fruits::CERISE){
            $this->cerises[] = $fruit;
        }
    }

    public function __toString(){
        $affichage = "Voici le contenu du panier " . $this->identifiant ." : <br/>";
        foreach($this->pommes as $pomme){
            $affichage .= $pomme;
        }
        foreach($this->cerises as $cerise){
            $affichage .= $cerise;
        }
        return $affichage;
    }
}
?>