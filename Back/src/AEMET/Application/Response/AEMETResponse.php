<?php

declare(strict_types=1);


namespace Src\AEMET\Application\Response;


final class AEMETResponse
{
    public function __construct(private array $aemet_response)
    {
    }

    /**
     * @return array
     */
    public function getAEMETResponse(): array
    {
        return $this->aemet_response;
    }
}
