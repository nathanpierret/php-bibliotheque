<?php

use App\Adherent;
use App\Bibliotheque;
use App\BluRay;
use App\Livre;
use App\Magazine;

require "./vendor/autoload.php";
require "./tests/utils/couleurs.php";

echo PHP_EOL;
echo GREEN_BACKGROUND.BLACK;
echo "Tests : classe Bibliotheque";
echo RESET;
echo PHP_EOL;

echo "Test : inscription d'un adhérent (classe Adherent demandée) \n";
//Arrange
$biblio = new Bibliotheque("Bibliothèque Jean Rostand");
$adherent = new Adherent("Gauthier","Desroches");
$adherent2 = new Adherent("Virginie","Chabot","14/05/2023");
//Act
$biblio->inscrireAdherent($adherent);
$biblio->inscrireAdherent($adherent2);
//Assertion
if (in_array($adherent,$biblio->getAdherents()) and in_array($adherent2,$biblio->getAdherents())) {
    echo GREEN."Test OK".RESET.PHP_EOL;
} else {
    echo RED."Test pas OK".RESET.PHP_EOL;
}

echo "Test : ajout d'un média dans la bibliothèque (classe Media demandée) \n";
//Arrange
$biblio2 = new Bibliotheque("Bibliothèque Thomas Edison");
$livre = new Livre("Couler, c'est pas si mal !",9785486548598,"Le petit Gregory",204);
$bluray = new BluRay("Titanic le remake","Jamie Kamheraune",6,28,2023);
$magazine = new Magazine("Illuminati magazine",1842,"01/02/2023");
//Act
$biblio2->ajouterMedia($livre);
$biblio2->ajouterMedia($bluray);
$biblio2->ajouterMedia($magazine);
//Assertion
if (in_array($livre,$biblio2->getMedias()) and in_array($bluray,$biblio2->getMedias()) and in_array($magazine,$biblio2->getMedias())) {
    echo GREEN."Test OK".RESET.PHP_EOL;
} else {
    echo RED."Test pas OK".RESET.PHP_EOL;
}

echo "Test : un adhérent emprunte un média (ajout d'une instance Emprunt) \n";
//Arrange
$biblio3 = new Bibliotheque("Bibliothèque Nelson Mandela");
$biblio3->inscrireAdherent($adherent);
$biblio3->ajouterMedia($livre);
//Act
$emprunt = $biblio3->emprunterMedia($adherent,$livre);
//Assertion
if ($emprunt) {
    echo GREEN."Test OK".RESET.PHP_EOL;
} else {
    echo RED."Test pas OK".RESET.PHP_EOL;
}