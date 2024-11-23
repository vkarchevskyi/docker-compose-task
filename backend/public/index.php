<?php

declare(strict_types=1);

use Vkarchevskyi\DockerComposeTask\Connection;
use Vkarchevskyi\DockerComposeTask\ResponseCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

try {
    $pdo = Connection::make()->connect();
    file_put_contents('php://stdout', 'A connection to the Postgres DB has established successfully');
} catch (PDOException $e) {
    echo $e->getMessage();
}

new ResponseCreator()->successfulResponse();
