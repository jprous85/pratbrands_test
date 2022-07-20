<?php

namespace Src\AEMET\Domain\Repositories;

use Src\AEMET\Domain\ValueObjects\AEMETMunicipalityURLVO;
use Src\AEMET\Domain\ValueObjects\AEMETMunicipalityVO;

interface AEMETInterface
{
    public function getAllMunicipalities(): string|array;

    public function getMunicipalityData(AEMETMunicipalityVO $municipality): ?array;

    public function getMunicipalityInfo(AEMETMunicipalityURLVO $municipality_url): ?array;
}
