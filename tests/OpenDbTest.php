<?php

namespace App\Tests;

use Doctrine\DBAL\Exception\ConnectionException;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class OpenDbTest extends KernelTestCase
{
    public function testDatabaseConnection(): void
    {
        $kernel = self::bootKernel();
        $entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        try {
            $entityManager->getConnection()->beginTransaction();
        } catch (\Throwable $th) {
            $this->expectException(ConnectionException::class);
            $this->expectExceptionMessage("Unknown database");
            $entityManager->getConnection()->beginTransaction();
        }

        $connected = $entityManager->getConnection()->isConnected();
        $this->assertTrue($connected);
    }
}
