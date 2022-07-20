<?php

declare(strict_types=1);


namespace Src\AEMET\Application\Response;


final class AEMETMunicipalitiesResponse
{
    public function __construct(private string $aemet_municipalities_response)
    {
    }

    /**
     * @return string
     */
    public function getAEMETResponse(): string
    {
        return $this->aemet_municipalities_response;
    }
}
