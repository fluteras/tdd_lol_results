<?php 
// Test Enregistrement en Base de données 
namespace App\Tests;
use App\Controller\AppController;
use App\Entity\Equipe;
use App\Entity\Matchs;
use App\Entity\Roster;
use App\Entity\RosterMatchs;
use App\Entity\StatJoueurMatch;
use App\Entity\Tournoi;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Cache\Marshaller\DeflateMarshaller;
final class DataSaveTest extends TestCase
{
    // Vérification calcul KDA ( 5*kill - 3*death + 2*assist )
    public function testCalculKDA1(): void
    {
        // Case : 12 kills 4 deaths 5 assists

        $this->assertEquals(AppController::calculkda(12,4,5),(12*5-3*4+2*5));

    }
    public function testCalculKDA2(): void	
    {
        // case : 1 kills 9 deaths 0 assists

        $this->assertEquals(AppController::calculkda(1,9,0),(1*5-3*9+0*5));

    }
    // Résultats Calcul Nombre de Victoires
    public function testNbVictoires3Victories(): void
    {
    // CREATION DU DATASET
    $tournoi = new Tournoi();
    $equipe = new Equipe();
    $roster1 = new Roster();
    $equipe->addHasRoster($roster1);
    //MATCH #1
    $match1 = new Matchs();
    $match1 ->setTournoiID($tournoi->getId());
    $ResultatMatch1 = new RosterMatchs();
    $ResultatMatch1-> setRosterID($roster1->getId());
    $ResultatMatch1-> setMatchsID($match1->getId());
    $ResultatMatch1-> setVictorieux(true);
    //MATCH #2
    $match2 = new Matchs();
    $match2 ->setTournoiID($tournoi->getId());
    $ResultatMatch2 = new RosterMatchs();
    $ResultatMatch2-> setRosterID($roster1->getId());
    $ResultatMatch2-> setMatchsID($match2->getId());
    $ResultatMatch2-> setVictorieux(true);
    //VICTOIRE #3
    $match3 = new Matchs();
    $match3 ->setTournoiID($tournoi->getId());
    $ResultatMatch3 = new RosterMatchs();
    $ResultatMatch3-> setRosterID($roster1->getId());
    $ResultatMatch3->setMatchsID($match3->getId());
    $ResultatMatch3-> setVictorieux(true);

    $this->assertEquals(AppController::calculNbVictoires($tournoi,$equipe),3);
    }

    public function testNbVictoires1Victory(): void
    {
    // CREATION DU DATASET
    $tournoi = new Tournoi();
    $equipe = new Equipe();
    $roster1 = new Roster();
    $equipe->addHasRoster($roster1);
    //MATCH #1
    $match1 = new Matchs();
    $match1 ->setTournoiID($tournoi->getId());
    $ResultatMatch1 = new RosterMatchs();
    $ResultatMatch1-> setRosterID($roster1->getId());
    $ResultatMatch1-> setMatchsID($match1->getId());
    $ResultatMatch1-> setVictorieux(false);
    //MATCH #2
    $match2 = new Matchs();
    $match2 ->setTournoiID($tournoi->getId());
    $ResultatMatch2 = new RosterMatchs();
    $ResultatMatch2-> setRosterID($roster1->getId());
    $ResultatMatch2-> setMatchsID($match2->getId());
    $ResultatMatch2-> setVictorieux(true);
    //MATCH #3
    $match3 = new Matchs();
    $match3 ->setTournoiID($tournoi->getId());
    $ResultatMatch3 = new RosterMatchs();
    $ResultatMatch3-> setRosterID($roster1->getId());
    $ResultatMatch3->setMatchsID($match3->getId());
    $ResultatMatch3-> setVictorieux(false);

    $this->assertEquals(AppController::calculNbVictoires($tournoi,$equipe),1);
    }
    
    // Insert success ? => return message indicating duplicate
    public function TestInsertSuccess(): void
    {
    // CREATION DU DATASET
        $Stats = new StatJoueurMatch;
        $Stats->setDeaths(2);
        $Stats->setKills(3);
        $Stats->setAssists(3);

    // TODO finir redactions de ce test
    }
}


