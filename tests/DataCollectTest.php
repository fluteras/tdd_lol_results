<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\KernelInterface;
use function PHPUnit\Framework\assertFileExists;

class DataCollectTest extends TestCase
{

    public function testFileExist(KernelInterface $kernel): void
    {
        $filePath = $kernel->getProjectDir().'var/data/'.$filename;
        $this->assertFileExists($filePath, "The file is not found");
    }
}
