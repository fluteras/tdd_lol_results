<?php 
// Test Enregistrement en Base de données 
namespace App\Tests;
use App\Controller\AppController;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Cache\Marshaller\DeflateMarshaller;
final class DataSaveTest extends TestCase
{
    // Vérification calcul KDA ( 5*kill - 3*death + 2*assist )
    public function testCalculKDA1(): void
    {
        // Case : 
        // 12 kills
        // 4 deaths
        // 5 assists

        $this->assertEquals(AppController::calculkda(12,4,5),12*5-3*4+12*5);

    }
    public function testCalculKDA2(): void	
    {
        // case :
        // 1 kills
        // 9 deaths
        // 0 assists

        $this->assertEquals(AppController::calculkda(1,9,0),1*5-3*9+0*5);

    }
    // Résultats Calcul Nombre de Victoires
    public function testNbVictoires(): void
    {
    // TODO
    }
    
    // Insert success ? => return message indicating duplicate
    public function TestInsertSuccess(): void
    {
    // TODO
    }
}


