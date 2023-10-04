<?php

use App\Adherent;
use App\BluRay;
use App\Emprunt;
use App\Livre;
use App\Magazine;

require "./vendor/autoload.php";
require "./test/utils/couleurs.php";

echo PHP_EOL;
echo GREEN_BACKGROUND.BLACK;
echo "Tests : classe Emprunt";
echo RESET;
echo PHP_EOL;

echo "Test : création d'un emprunt (date d'emprunt = date du jour) \n";
//Arrange
$adherent = new Adherent("Martin","Leduc","23/05/2023");
$livre = new Livre("BTS SIO pour les nuls",9785461234578,"Jacques Patrick",244);
$emprunt1 = new Emprunt($livre,$adherent);
//Assertion
if ($emprunt1->getDateEmprunt()->format('d/m/Y') === (new DateTime())->format('d/m/Y')) {
    echo GREEN."Test OK".RESET.PHP_EOL;
} else {
    echo RED."Test pas OK".RESET.PHP_EOL;
}

echo "Test : la date de retour estimée d'un livre doit être égale à la date d'emprunt + 21 jours \n";
//Arrange
$dateRetourTest = clone $emprunt1->getDateEmprunt();
$dateRetourTest->modify("+21 days");
//Assertion
if ($emprunt1->getDateRetourEstimee()->format('d/m/Y') === $dateRetourTest->format("d/m/Y")) {
    echo GREEN."Test OK".RESET.PHP_EOL;
} else {
    echo RED."Test pas OK".RESET.PHP_EOL;
}

echo "Test : la date de retour estimée d'un Blu-Ray doit être égale à la date d'emprunt + 15 jours \n";
//Arrange
$bluray = new BluRay("Titanic","James Cameron",3,14,"1997");
$emprunt2 = new Emprunt($bluray,$adherent);
$dateRetourTest = clone $emprunt2->getDateEmprunt();
$dateRetourTest->modify("+15 days");
//Assertion
if ($emprunt2->getDateRetourEstimee()->format('d/m/Y') === $dateRetourTest->format("d/m/Y")) {
    echo GREEN."Test OK".RESET.PHP_EOL;
} else {
    echo RED."Test pas OK".RESET.PHP_EOL;
}

echo "Test : la date de retour estimée d'un magazine doit être égale à la date d'emprunt + 10 jours \n";
//Arrange
$magazine = new Magazine("Picsou Magazine",249,"05/02/2019");
$emprunt3 = new Emprunt($magazine,$adherent);
$dateRetourTest = clone $emprunt3->getDateEmprunt();
$dateRetourTest->modify("+10 days");
//Assertion
if ($emprunt3->getDateRetourEstimee()->format('d/m/Y') === $dateRetourTest->format("d/m/Y")) {
    echo GREEN."Test OK".RESET.PHP_EOL;
} else {
    echo RED."Test pas OK".RESET.PHP_EOL;
}

echo "Test : vérification qu'un emprunt est toujours en cours (date de retour non précisée)\n";
//Act
$resultat = $emprunt1->checkIfEmprunte();
//Assertion
if ($resultat) {
    echo GREEN."Test OK".RESET.PHP_EOL;
} else {
    echo RED."Test pas OK".RESET.PHP_EOL;
}

echo "Test : vérification qu'un emprunt est en alerte (date de retour non précisée et dépassement de date de retour estimée)\n";
$livre2 = new Livre("La soupe aux choux",9785642316452,"Nadine Busson",315);
$emprunt4 = new Emprunt($livre2,$adherent);
//Arrange
$emprunt4->setDateEmprunt("01/09/2023");
//Act
$resultat = $emprunt4->checkAlertEmprunt();
//Assertion
if ($resultat) {
    echo GREEN."Test OK".RESET.PHP_EOL;
} else {
    echo RED."Test pas OK".RESET.PHP_EOL;
}

echo "Test : vérification que la durée d'un emprunt est dépassée (date de retour précisée et dépassement de date de retour estimée)\n";
//Arrange
$magazine2 = new Magazine("National Geographic Magazine",764,"03/07/2023");
$emprunt5 = new Emprunt($magazine2,$adherent);
$emprunt5->setDateEmprunt("14/07/2023");
$emprunt5->setDateRetour("01/08/2023");
//Act
$resultat = $emprunt5->checkDepassementDate();
//Assertion
if ($resultat) {
    echo GREEN."Test OK".RESET.PHP_EOL;
} else {
    echo RED."Test pas OK".RESET.PHP_EOL;
}
