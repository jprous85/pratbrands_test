<?php

declare(strict_types=1);


namespace Src\AEMET\Domain;


final class AEMETConstants
{
    const BASE_URI = 'https://opendata.aemet.es/opendata/api';

    const MUNICIPALITIES_URL = self::BASE_URI . DIRECTORY_SEPARATOR . 'maestro/municipios';
    const MUNICIPALITY_DATA  = self::BASE_URI . DIRECTORY_SEPARATOR . 'prediccion/especifica/municipio/diaria';
}
