<?php

declare(strict_types=1);


namespace Src\AEMET\Infrastructure\Controllers;

use Src\AEMET\Application\Request\MunicipalityRequest;
use Src\AEMET\Application\Request\MunicipalityUrlRequest;
use Src\AEMET\Application\UseCases\GetAllMunicipalities;
use Src\AEMET\Application\UseCases\GetMunicipalityData;
use Src\AEMET\Application\UseCases\GetMunicipalityInfo;
use Src\AEMET\Infrastructure\Service\AEMETMunicipalityService;
use Src\Shared\Infrastructure\Controllers\APISharedController;
use Symfony\Component\HttpFoundation\JsonResponse;

final class AEMETGetController extends APISharedController
{

    public function __construct(
        private GetAllMunicipalities $get_all_municipalities,
        private GetMunicipalityData  $get_municipality_data,
        private GetMunicipalityInfo  $get_municipality_info
    )
    {
    }

    public function getAllMunicipalities(): JsonResponse
    {
        $response = ($this->get_all_municipalities)();
        $data     = json_decode(mb_convert_encoding($response->getAEMETResponse(), 'UTF-8', 'UTF-8'), true);

        $result = (new AEMETMunicipalityService)->formatMunicipalitiesArray($data);

        return $this->successResponse($result);
    }

    public function getMunicipality(string $municipality): JsonResponse
    {
        $response = ($this->get_municipality_data)(new MunicipalityRequest($municipality));

        if ($response->getAEMETResponse()['estado'] == 404) {
            return $this->errorResponse($response->getAEMETResponse());
        }

        $info = ($this->get_municipality_info)(new MunicipalityUrlRequest($response->getAEMETResponse()['datos']));
        return $this->successResponse($info->getAEMETResponse());
    }
}
