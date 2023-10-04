<?php

use App\Adherent;

require "./vendor/autoload.php";
require "./test/utils/couleurs.php";

echo PHP_EOL;
echo GREEN_BACKGROUND.BLACK;
echo "Tests : classe Adherent";
echo RESET;
echo PHP_EOL;

echo "Test : création d'un adhérent sans date d'adhésion (date par défaut : date du jour) \n";
//Arrange
$adherent1 = new Adherent("Jean","Dupond");
//Assertion
if ($adherent1->getDateAdhesion()->format('d/m/Y') === (new DateTime())->format('d/m/Y')) {
    echo GREEN."Test OK".RESET.PHP_EOL;
} else {
    echo RED."Test pas OK".RESET.PHP_EOL;
}

echo "Test : création d'un adhérent avec une date d'adhésion \n";
//Arrange
$adherent2 = new Adherent("Martin","Leduc","23/05/2023");
//Assertion
if ($adherent2->getDateAdhesion()->format('d/m/Y') === "23/05/2023") {
    echo GREEN."Test OK".RESET.PHP_EOL;
} else {
    echo RED."Test pas OK".RESET.PHP_EOL;
}

echo "Test : vérification de la validité du numéro d'adhérent \n";
//Arrange
$adherent3 = new Adherent("Fanette","Marquis");
//Act
$adherent3->genererNumero();
$numNB = intval(substr($adherent3->getNumeroAdherent(),3));
//Assertion
if (str_starts_with($adherent3->getNumeroAdherent(), "AD-") and $numNB >= 0 and $numNB <= 999999) {
    echo GREEN."Test OK".RESET.PHP_EOL;
} else {
    echo RED."Test pas OK".RESET.PHP_EOL;
}

echo "Test : vérification de la validité de l'adhésion (la date d'adhésion ne doit pas être dépassée) \n";
//Act
$resultat = $adherent2->checkValiditeAdhesion();
//Assertion
if ($resultat) {
    echo GREEN."Test OK".RESET.PHP_EOL;
} else {
    echo RED."Test pas OK".RESET.PHP_EOL;
}

echo "Test : vérification que l'adhésion n'est pas valable (la date d'adhésion doit être dépassée) \n";
//Arrange
$adherent4 = new Adherent("Joël","Lucas","10/08/2022");
//Act
$resultat = $adherent4->checkValiditeAdhesion();
//Assertion
if (!$resultat) {
    echo GREEN."Test OK".RESET.PHP_EOL;
} else {
    echo RED."Test pas OK".RESET.PHP_EOL;
}

echo "Test : vérification que l'adhésion se renouvelle \n";
$adherent5 = new Adherent("Felicienne","Bernier","13/11/2022");
//Act
$adherent5->renouvelerAdhesion();
//Assertion
if ($adherent5->getDateAdhesion()->format('d/m/Y') === "13/11/2023") {
    echo GREEN."Test OK".RESET.PHP_EOL;
} else {
    echo RED."Test pas OK".RESET.PHP_EOL;
}