<?php

declare(strict_types=1);


namespace Src\AEMET\Application\UseCases;


use Src\AEMET\Application\Request\MunicipalityRequest;
use Src\AEMET\Application\Response\AEMETResponse;
use Src\AEMET\Domain\Repositories\AEMETInterface;
use Src\AEMET\Domain\ValueObjects\AEMETMunicipalityVO;

final class GetMunicipalityData
{
    public function __construct(private AEMETInterface $repository)
    {
    }

    public function __invoke(MunicipalityRequest $request): AEMETResponse
    {
        return (new AEMETResponse($this->repository->getMunicipalityData(new AEMETMunicipalityVO($request->getMunicipality()))));
    }
}
