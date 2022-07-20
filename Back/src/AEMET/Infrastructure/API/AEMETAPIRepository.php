<?php

declare(strict_types=1);


namespace Src\AEMET\Infrastructure\API;


use GuzzleHttp\Exception\GuzzleException;

use Src\AEMET\Domain\AEMETConstants;
use Src\AEMET\Domain\Repositories\AEMETInterface;
use Src\AEMET\Domain\ValueObjects\AEMETMunicipalityURLVO;
use Src\AEMET\Domain\ValueObjects\AEMETMunicipalityVO;

final class AEMETAPIRepository extends HTTPClient implements AEMETInterface
{
    /**
     * @throws GuzzleException
     */
    public function getAllMunicipalities(): array|string
    {
        return $this->get(AEMETConstants::MUNICIPALITIES_URL);
    }

    /**
     * @throws GuzzleException
     */
    public function getMunicipalityData(AEMETMunicipalityVO $municipality): ?array
    {
        return $this->get(AEMETConstants::MUNICIPALITY_DATA . DIRECTORY_SEPARATOR . $municipality->getValue(), true);
    }

    /**
     * @throws GuzzleException
     */
    public function getMunicipalityInfo(AEMETMunicipalityURLVO $municipality_url): ?array
    {
        return $this->getCustomUrl($municipality_url->getValue());
    }
}
