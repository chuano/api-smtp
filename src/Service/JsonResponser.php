<?php
declare(strict_types=1);

namespace App\Service;


use Symfony\Component\HttpFoundation\JsonResponse;

class JsonResponser
{
    public function response(string $message, int $code = 200)
    {
        return new JsonResponse(['message' => $message], $code);
    }
}