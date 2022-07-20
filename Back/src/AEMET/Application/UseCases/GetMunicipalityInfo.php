<?php

declare(strict_types=1);


namespace Src\AEMET\Application\UseCases;


use Src\AEMET\Application\Request\MunicipalityUrlRequest;
use Src\AEMET\Application\Response\AEMETResponse;
use Src\AEMET\Domain\Repositories\AEMETInterface;
use Src\AEMET\Domain\ValueObjects\AEMETMunicipalityURLVO;

final class GetMunicipalityInfo
{
    public function __construct(private AEMETInterface $repository)
    {
    }

    public function __invoke(MunicipalityUrlRequest $request): AEMETResponse
    {
        return (new AEMETResponse($this->repository->getMunicipalityInfo(new AEMETMunicipalityURLVO($request->getMunicipalityUrl()))));
    }
}
