<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class DataCollectTest extends KernelTestCase
{
    private $fileName = 'Match1LyonData.json';      // nom fichier valide
    private $fileNotExisting = 'UnknownFile.json';  // nom fichier non existant
    private $fileNotJson = 'Match1LyonData.txt';    // nom fichier non json (.txt)

    public function getPath(string $fileName) : string
    {
        // get kernel for getting path to our project
        $kernel = self::bootKernel();

        // get path to our file
        return $kernel->getProjectDir()."\\var\\data\\$fileName";
    }


    // Tests "Source dispo ?"
    public function testFileExist(): void
    {
        $filePath = $this->getPath($this->fileName);

        $this->assertFileExists($filePath, "The file is not found");
    }

    public function testFileNotExist(): void
    {
        $filePath = $this->getPath($this->fileNotExisting);
        
        $this->assertFileDoesNotExist($filePath, "The file is not found");
    }


    // Tests "Lecture du fichier ?"
    public function testFileIsReadable(): void
    {
        $filePath = $this->getPath($this->fileName);

        $this->assertIsReadable($filePath);
    }

    public function testFileIsNotReadable(): void
    {
        $filePath = $this->getPath($this->fileNotExisting);

        $this->assertIsNotReadable($filePath);
    }


    // Tests "Json ?"
    public function testFileIsJson(): void
    {
        // TODO open file and get the file content
        // $filecontent = AppController::getContent($this->fileName);

        // test not using code
        $filecontent = file_get_contents($this->getPath($this->fileName));

        $this->assertNotNull(json_decode($filecontent));
    }

    public function testFileNotJson(): void
    {
        // TODO open file and get the file content
        // $filecontent = AppController::getContent($this->fileNotJson);

        // test not using code
        $filecontent = file_get_contents($this->getPath($this->fileNotJson));

        $this->assertNull(json_decode($filecontent));
    }
}