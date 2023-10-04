<?php

namespace App\Tests;

use App\Adherent;
use PHPUnit\Framework\TestCase;

class AdherentTest extends TestCase
{
    /**
     * @test
     */
    public function CreerAdherent_SansDateAdhesion_DateAdhesionEgaleDateDuJour()
    {
        //Arrange
        $adherent = new Adherent("Jean","Dupond");
        //Assertion
        $this->assertEquals((new \DateTime())->format('d/m/Y'),$adherent->getDateAdhesion()->format('d/m/Y'));
    }

    /**
     * @test
     */
    public function CreerAdherent_AvecDateAdhesion_DateAdhesionEgaleDateChoisie()
    {
        //Arrange
        $dateAdhesionChoisie = "23/05/2023";
        $adherent = new Adherent("Martin","Leduc",$dateAdhesionChoisie);
        //Assertion
        $this->assertEquals($dateAdhesionChoisie,$adherent->getDateAdhesion()->format('d/m/Y'));
    }

    /**
     * @test
     */
    public function GenererNumero_VerifierValidite_ADSuiviDe6Chiffres()
    {
        //Arrange
        $adherent = new Adherent("Fanette","Marquis");
        //Act
        $adherent->genererNumero();
        $numNB = substr($adherent->getNumeroAdherent(),3);
        //Assertion
        $this->assertStringStartsWith("AD-",$adherent->getNumeroAdherent());
        $this->assertEquals(6,strlen($numNB));
        $this->assertGreaterThanOrEqual(0,$numNB);
        $this->assertLessThanOrEqual(999999,$numNB);
    }

    /**
     * @test
     */
    public function CheckValiditeAdhesion_AdhesionValable_DateAdhesionNeDoitPasEtreDepassee()
    {
        //Arrange
        $adherent = new Adherent("Jewel", "Villeneuve", "16/07/2023");
        //Act
        $resultat = $adherent->checkValiditeAdhesion();
        //Assertion
        $this->assertTrue($resultat);
    }

    /**
     * @test
     */
    public function CheckValiditeAdhesion_AdhesionNonValable_DateAdhesionDoitEtreDepassee()
    {
        //Arrange
        $adherent = new Adherent("Russell","Bernier","10/08/2022");
        //Act
        $resultat = $adherent->checkValiditeAdhesion();
        //Assertion
        $this->assertFalse($resultat);
    }

    /**
     * @test
     */
    public function RenouvelerAdhesion_ModifierDateAdhesion_DoitEtre1AnDePlusQueAncienne()
    {
        //Arrange
        $adherent = new Adherent("Blanche","Laframboise","13/11/2022");
        $datePlus1An = "13/11/2023";
        //Act
        $adherent->renouvelerAdhesion();
        //Assertion
        $this->assertEquals($datePlus1An,$adherent->getDateAdhesion()->format('d/m/Y'));
    }
}