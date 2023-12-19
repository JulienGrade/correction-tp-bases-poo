<?php


require_once("src/Fruits.php");
require_once("src/Panier.php");
include("partials/header.php");
include("partials/menu.php");
?>

    <h2> Fruits : </h2>

<?php
echo '<form action="#" method ="POST" >';
echo '<fieldset><legend>Panier à créer :</legend>';
echo '<label class="text-blue-700 text-lg" for="nb_pommes">Nombres de pommes : </label>';
echo '<input class="ring-1 rounded-md ring-blue-200" type="number" name="nb_pommes" id="nb_pommes" required/>';
echo '<label class="text-blue-700 text-lg" for="nb_cerise">Nombres de cerises : </label>';
echo '<input class="ring-1 rounded-md ring-blue-200" type="number" name="nb_cerise" id="nb_cerise" required/>';
echo '<input class="bg-blue-700 cursor-pointer hover:bg-blue-300 rounded-md text-white px-6 py-2 mx-5 transition-all duration-500" type="submit" value="Créer le panier" />';
echo "</fieldset></form>";

$pomme1 = new Fruits(Fruits::POMME,150);
$pomme2 = new Fruits(Fruits::POMME,130);
$pomme3 = new Fruits(Fruits::POMME,160);
$cerise1 = new Fruits(Fruits::CERISE,10);
$cerise2 = new Fruits(Fruits::CERISE,15);
$cerise3 = new Fruits(Fruits::CERISE,20);
$cerise4 = new Fruits(Fruits::CERISE,10);

$panier1 = new Panier();
$panier1->addFruit($pomme1);
$panier1->addFruit($pomme2);
$panier1->addFruit($cerise1);

$panier2 = new Panier();
$panier2->addFruit($pomme3);
$panier2->addFruit($cerise2);
$panier2->addFruit($cerise3);
$panier2->addFruit($cerise4);

$paniers = [$panier1,$panier2];

if(isset($_POST['nb_pommes'])){
    $p = new Panier();
    $nbPomme = (int)$_POST['nb_pommes'];
    $nbCerise = (int)$_POST['nb_cerise'];
    for($i = 0 ; $i < $nbPomme;$i++){
        $p->addFruit(new Fruits(Fruits::POMME,random_int(120,160)));
    }
    for($i = 0 ; $i < $nbCerise;$i++){
        $p->addFruit(new Fruits(Fruits::CERISE,random_int(30,40)));
    }
    $paniers[] = $p;
}

foreach($paniers as $panier){
    echo $panier;
}

echo '<form action="#" method ="POST" >';
echo '<label class="text-blue-700 text-lg" for="panier"> Panier : </label>';
echo '<select name="panier" id="panier" onChange="submit()">';
echo "<option value=''></option>";
foreach($paniers as $panier){
    echo "<option value='".$panier->getIdentifiant()."'>Panier ".$panier->getIdentifiant()."</option>";
}
echo "</select>";
echo "</form>";

if(isset($_POST['panier'])){
    $panierAAfficher = getPanierById((int)$_POST['panier']);
    echo "<h2 class='text-blue-400 text-xl text-center'>Affichage du panier ".$_POST['panier'] ."</h2>";
    echo $panierAAfficher;
}

function getPanierById($id){
    global $paniers;
    foreach($paniers as $panier){
        if($panier->getIdentifiant() === $id){
            return $panier;
        }
    }
}

?>

<?php
include("partials/footer.php");
?>