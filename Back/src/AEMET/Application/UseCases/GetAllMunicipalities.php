<?php

declare(strict_types=1);


namespace Src\AEMET\Application\UseCases;


use Src\AEMET\Application\Response\AEMETMunicipalitiesResponse;
use Src\AEMET\Domain\Repositories\AEMETInterface;

final class GetAllMunicipalities
{
    public function __construct(private AEMETInterface $repository)
    {
    }

    public function __invoke(): AEMETMunicipalitiesResponse
    {
        return (new AEMETMunicipalitiesResponse($this->repository->getAllMunicipalities()));
    }
}
