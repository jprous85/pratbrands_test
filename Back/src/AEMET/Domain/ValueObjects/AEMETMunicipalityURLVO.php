<?php

declare(strict_types=1);


namespace Src\AEMET\Domain\ValueObjects;


final class AEMETMunicipalityURLVO
{
    public function __construct(private string $municipality)
    {
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->municipality;
    }


}
