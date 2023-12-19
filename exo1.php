<?php


include("partials/header.php");
include("partials/menu.php");
require_once("src/Fruits.php");
?>

    <h2> Fruits : </h2>

<?php
$pomme1 = new Fruits(Fruits::POMME,150);
$pomme2 = new Fruits(Fruits::POMME,130);
$pomme3 = new Fruits(Fruits::POMME,160);
$cerise1 = new Fruits(Fruits::CERISE,10);
$cerise2 = new Fruits(Fruits::CERISE,15);
$cerise3 = new Fruits(Fruits::CERISE,20);
$cerise4 = new Fruits(Fruits::CERISE,10);
$fruits = [$pomme1,$pomme2,$pomme3,$cerise1,$cerise2,$cerise3,$cerise4];

foreach($fruits as $fruit){
    echo $fruit;
    echo "<br />------------------------ <br />";
}
?>

<?php
include("partials/footer.php");
?>