<?php

use src\Warrior;

include("partials/header.php");
include("partials/menu.php");
require_once ('src/Personnage.php');
require_once('src/Warrior.php');

?>
<section class="w-5/6 mx-auto">
    <h2 class="text-blue-300 my-5 text-xl"> Personnage : </h2>

<?php
$p1 = new Personnage("Luke", 27, Personnage::HOMME, Personnage::FORCE_MED, Personnage::AGILITE_MED, "player.png");

$p2 = new Personnage("Katy", 22, Personnage::FEMME, Personnage::FORCE_MIN, Personnage::AGILITE_MAX, "playerF.png");

$p3 = new Personnage("Marc", 33, Personnage::HOMME, Personnage::FORCE_MAX, Personnage::AGILITE_MIN, "playerM.png");

$p4 = new Warrior("Aragorn", 38, Personnage::HOMME, Personnage::FORCE_MAX, Personnage::AGILITE_MIN, "playerM.png", "Épée");

$persos = Personnage::getListPersonnages();
foreach($persos as $perso){
    $perso->afficherInfo();
    echo "<br/>----------------------";
    echo "<br/>";
}
echo "<br/>";
echo $p4->getWeapon();
?>
</section>
<?php

include("partials/footer.php");