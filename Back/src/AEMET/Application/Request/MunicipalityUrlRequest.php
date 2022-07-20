<?php

declare(strict_types=1);


namespace Src\AEMET\Application\Request;


final class MunicipalityUrlRequest
{
    public function __construct(private string $municipality_url)
    {
    }

    /**
     * @return string
     */
    public function getMunicipalityUrl(): string
    {
        return $this->municipality_url;
    }


}
