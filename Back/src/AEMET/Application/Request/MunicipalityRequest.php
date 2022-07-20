<?php

declare(strict_types=1);


namespace Src\AEMET\Application\Request;


final class MunicipalityRequest
{
    public function __construct(private string $municipality)
    {
    }

    /**
     * @return string
     */
    public function getMunicipality(): string
    {
        return $this->municipality;
    }


}
