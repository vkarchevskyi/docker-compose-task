<?php

declare(strict_types=1);

namespace Vkarchevskyi\DockerComposeTask;

final readonly class ResponseCreator
{
    public function successfulResponse(): void
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: text/plain; charset=UTF-8");
        header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        http_response_code(200);

        echo 'Hello World';
    }
}
