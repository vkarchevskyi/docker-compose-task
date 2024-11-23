<?php

declare(strict_types=1);

namespace Vkarchevskyi\DockerComposeTask;

use PDO;
use SensitiveParameter;

final class Connection
{
    private static ?Connection $connection = null;

    public function connect(): PDO
    {
        $dsn = $this->getDataSourceName();

        return $this->createDataObject($dsn);
    }

    public static function make(): Connection
    {
        if (null === self::$connection) {
            self::$connection = new self();
        }

        return self::$connection;
    }

    private function __construct()
    {
    }

    private function getDataSourceName(): string
    {
        return sprintf(
            "pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s",
            $_ENV['DB_HOST'],
            $_ENV['DB_PORT'],
            $_ENV['DB_DATABASE'],
            $_ENV['DB_USER'],
            $_ENV['DB_PASSWORD']
        );
    }

    private function createDataObject(#[SensitiveParameter] string $dsn): PDO
    {
        $pdo = new PDO($dsn);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
}