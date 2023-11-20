<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class DataCollectTest extends KernelTestCase
{
    private $fileName = 'Match1LyonData';   // nom fichier
    // private $kernel = self::bootKernel();   // kernel

    public function testFileExist(): void
    {
        $kernel = self::bootKernel();   // kernel

        // get path to our file
        $filePath = $kernel->getProjectDir()."\\var\\data\\$this->fileName.json";
        $this->assertFileExists($filePath, "The file is not found");
    }

    public function testFileNotExist(): void
    {
        
    }
}