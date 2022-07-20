<?php

declare(strict_types=1);


namespace Src\Shared\Infrastructure\Controllers;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class APISharedController
{
    public function successResponse($data): JsonResponse
    {
        return new JsonResponse(['code' => Response::HTTP_OK, 'data' => $data]);
    }

    public function errorResponse($data): JsonResponse
    {
        return new JsonResponse(['code' => Response::HTTP_NOT_FOUND, 'data' => $data]);
    }
}
