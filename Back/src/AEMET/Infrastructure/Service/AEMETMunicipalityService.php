<?php

declare(strict_types=1);

namespace Src\AEMET\Infrastructure\Service;


final class AEMETMunicipalityService
{
    public function formatMunicipalitiesArray($municipalities): array
    {

        $country = $this->getFormatCountry();

        foreach ($municipalities as $municipality) {

            foreach ($country as $key_communities => $communities) {
                foreach ($communities as $key_community => $community) {
                    foreach ($community as $key_province => $province) {
                        if ($municipality['zona_comarcal'] == $country[$key_communities][$key_community][$key_province]['ID']) {
                            $country[$key_communities][$key_community][$key_province]['data'][] = [
                                'name'      => $municipality['nombre'],
                                'id'        => substr($municipality['id'], 2),
                                'latitude'  => $municipality['latitud_dec'],
                                'longitude' => $municipality['longitud_dec']
                            ];
                        }
                    }
                }
            }
        }

        return $country;
    }

    private function getFormatCountry(): array
    {
        return [
            'Andalucía'                  => [
                'Almería' => [
                    [
                        'Nombre' => 'Valle del Almanzora y los Vélez',
                        'ID'     => '610401',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Nacimiento y Campo de Tabernas',
                        'ID'     => '610402',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Poniente y Almería Capital',
                        'ID'     => '610403',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Levante almeriense',
                        'ID'     => '610404',
                        'data'   => []
                    ]
                ],
                'Cádiz'   => [
                    [
                        'Nombre' => 'Grazalema',
                        'ID'     => '611101',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Campiña gaditana',
                        'ID'     => '611102',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Litoral gaditano',
                        'ID'     => '611103',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Estrecho',
                        'ID'     => '611104',
                        'data'   => []
                    ],
                ],
                'Córdoba' => [
                    [
                        'Nombre' => 'Sierra y Pedroches',
                        'ID'     => '611401',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Campiña cordobesa',
                        'ID'     => '611402',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'SSubbética cordobesa',
                        'ID'     => '611403',
                        'data'   => []
                    ],
                ],
                'Granada' => [
                    [
                        'Nombre' => 'Cuenca del Genil',
                        'ID'     => '611801',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Guadix y Baza',
                        'ID'     => '611802',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Nevada y Alpujarras',
                        'ID'     => '611803',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Costa granadina',
                        'ID'     => '611804',
                        'data'   => []
                    ],
                ],
                'Huelva'  => [
                    [
                        'Nombre' => 'Aracena',
                        'ID'     => '612101',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Andévalo y Condado',
                        'ID'     => '612102',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Litoral de Huelva',
                        'ID'     => '612103',
                        'data'   => []
                    ]
                ],
                'Jaén'    => [
                    [
                        'Nombre' => 'Morena y Condado',
                        'ID'     => '612301',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Cazorla y Segura',
                        'ID'     => '612302',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Valle del Guadalquivir de Jaén',
                        'ID'     => '612303',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Capital y Montes de Jaén',
                        'ID'     => '612304',
                        'data'   => []
                    ]
                ],
                'Málaga'  => [
                    [
                        'Nombre' => 'Antequera',
                        'ID'     => '612901',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Ronda',
                        'ID'     => '612902',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Sol y Guadalhorce',
                        'ID'     => '612903',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Axarquía',
                        'ID'     => '612904',
                        'data'   => []
                    ],
                ],
                'Sevilla' => [
                    [
                        'Nombre' => 'Sierra norte de Sevilla',
                        'ID'     => '614101',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Campiña sevillana',
                        'ID'     => '614102',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Sierra sur de Sevilla',
                        'ID'     => '614103',
                        'data'   => []
                    ],
                ]
            ],
            'Aragón'                     => [
                'Huesca'   => [
                    [
                        'Nombre' => 'Pirineo Oscense',
                        'ID'     => '622201',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Centro de Huesca',
                        'ID'     => '622202',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Sur de Huesca',
                        'ID'     => '622203',
                        'data'   => []
                    ],
                ],
                'Teruel'   => [
                    [
                        'Nombre' => 'Albarracín y Jiloca',
                        'ID'     => '624401',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Gúdar y Maestrazgo',
                        'ID'     => '624402',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Bajo Aragón de Teruel',
                        'ID'     => '624403',
                        'data'   => []
                    ],
                ],
                'Zaragoza' => [
                    [
                        'Nombre' => 'Cinco villas de Zaragoza',
                        'ID'     => '625001',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Ibérica zaragozana',
                        'ID'     => '625002',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Ribera del Ebro de Zaragoza',
                        'ID'     => '625003',
                        'data'   => []
                    ],
                ]
            ],
            'Principado de Asturias'     => [
                'Asturias' => [
                    [
                        'Nombre' => 'Litoral occidental asturiano',
                        'ID'     => '633301',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Litoral oriental asturiano',
                        'ID'     => '633302',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Suroccidental asturiana',
                        'ID'     => '633303',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Central y Valles Mineros',
                        'ID'     => '633304',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Cordillera y Picos de Europa',
                        'ID'     => '633305',
                        'data'   => []
                    ],
                ]
            ],
            'Illes Balears'              => [
                'Illes Balears' => [
                    [
                        'Nombre' => 'Ibiza y Formentera',
                        'ID'     => '645301',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Sierra Tramontana',
                        'ID'     => '645401',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Norte y nordeste de Mallorca',
                        'ID'     => '645402',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Interior de Mallorca',
                        'ID'     => '645403',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Sur de Mallorca',
                        'ID'     => '645404',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Levante mallorquín',
                        'ID'     => '645405',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Menorca',
                        'ID'     => '645501',
                        'data'   => []
                    ],
                ]
            ],
            'Canarias'                   => [
                'Las Palmas'             => [
                    [
                        'Nombre' => 'Norte de Gran Canaria',
                        'ID'     => '659001',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Cumbres de Gran Canaria',
                        'ID'     => '659003',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Este, sur y oeste de Gran Canaria',
                        'ID'     => '659004',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Lanzarote',
                        'ID'     => '659101',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Fuerteventura',
                        'ID'     => '659201',
                        'data'   => []
                    ],
                ],
                'Santa Cruz de Tenerife' => [
                    [
                        'Nombre' => 'Cumbre de la Palma',
                        'ID'     => '659302',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Este de la Palma',
                        'ID'     => '659303',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Oeste de la Palma',
                        'ID'     => '659304',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'La Gomera',
                        'ID'     => '659401',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'El Hierro',
                        'ID'     => '659501',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Norte de Tenerife',
                        'ID'     => '659601',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Área metropolitana de Tenerife',
                        'ID'     => '659602',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Este, sur y oeste de Tenerife',
                        'ID'     => '659603',
                        'data'   => []
                    ]
                ]
            ],
            'Cantabria'                  => [
                'Cantabria' => [
                    [
                        'Nombre' => 'Litoral cántabro',
                        'ID'     => '663901',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Liébana',
                        'ID'     => '663902',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Centro y valle de Villaverde',
                        'ID'     => '663903',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Cantabria del Ebro',
                        'ID'     => '663904',
                        'data'   => []
                    ],
                ]
            ],
            'Castilla y León'            => [
                'Ávila'      => [
                    [
                        'Nombre' => 'Meseta de Ávila',
                        'ID'     => '670501',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Sistema Central de Ávila',
                        'ID'     => '670502',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Sur de Ávila',
                        'ID'     => '670503',
                        'data'   => []
                    ],
                ],
                'Burgos'     => [
                    [
                        'Nombre' => 'Cordillera Cantábrica de Burgos',
                        'ID'     => '670901',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Norte de Burgos',
                        'ID'     => '670902',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Condado de Treviño',
                        'ID'     => '670903',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Meseta de Burgos',
                        'ID'     => '670904',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Ibérica de Burgos',
                        'ID'     => '670905',
                        'data'   => []
                    ],
                ],
                'León'       => [
                    [
                        'Nombre' => 'Cordillera Cantábrica de León',
                        'ID'     => '672401',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Bierzo de León',
                        'ID'     => '672402',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Meseta de León',
                        'ID'     => '672403',
                        'data'   => []
                    ],
                ],
                'Palencia'   => [
                    [
                        'Nombre' => 'Cordillera Catábrica de Palencia',
                        'ID'     => '673401',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Meseta de Palencia',
                        'ID'     => '673402',
                        'data'   => []
                    ],
                ],
                'Salamanca'  => [
                    [
                        'Nombre' => 'Meseta de Salamanca',
                        'ID'     => '673701',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Sistema Central de Salamanca',
                        'ID'     => '673702',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Sur de Salamanca',
                        'ID'     => '673703',
                        'data'   => []
                    ],
                ],
                'Segovia'    => [
                    [
                        'Nombre' => 'Meseta de Segovia',
                        'ID'     => '674001',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Sistema Central de Segovia',
                        'ID'     => '674002',
                        'data'   => []
                    ],
                ],
                'Soria'      => [
                    [
                        'Nombre' => 'Ibérica de Soria',
                        'ID'     => '674201',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Meseta de Soria',
                        'ID'     => '674202',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Sistema Central de Soria',
                        'ID'     => '674203',
                        'data'   => []
                    ],
                ],
                'Valladolid' => [
                    [
                        'Nombre' => 'Meseta de Valladolid',
                        'ID'     => '674701',
                        'data'   => []
                    ],
                ],
                'Zamora'     => [
                    [
                        'Nombre' => 'Sanabria',
                        'ID'     => '674901',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Meseta de Zamora',
                        'ID'     => '674902',
                        'data'   => []
                    ],
                ]
            ],
            'Castilla - La Mancha'       => [
                'Albacete'    => [
                    [
                        'Nombre' => 'La Mancha albaceteña',
                        'ID'     => '680201',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Alcaraz y Segura',
                        'ID'     => '680202',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Hellín y Almansa',
                        'ID'     => '680203',
                        'data'   => []
                    ],
                ],
                'Ciudad Real' => [
                    [
                        'Nombre' => 'Montes del norte y Anchuras',
                        'ID'     => '681301',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'La Mancha de Ciudad Real',
                        'ID'     => '681302',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Valle del Guadiana',
                        'ID'     => '681303',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Sierras de Alcudia y Madrona',
                        'ID'     => '681304',
                        'data'   => []
                    ],
                ],
                'Cuenca'      => [
                    [
                        'Nombre' => 'Alcarria conquense',
                        'ID'     => '681601',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Serranía de Cuenca',
                        'ID'     => '681602',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'La Mancha conquense',
                        'ID'     => '681603',
                        'data'   => []
                    ],
                ],
                'Guadalajara' => [
                    [
                        'Nombre' => 'Serranía de Guadalajara',
                        'ID'     => '681901',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Parameras de Molina',
                        'ID'     => '681902',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Alcarria de Guadalajara',
                        'ID'     => '681903',
                        'data'   => []
                    ],
                ],
                'Toledo'      => [
                    [
                        'Nombre' => 'Sierra de San Vicente',
                        'ID'     => '684501',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Valle del Tajo',
                        'ID'     => '684502',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Montes de Toledo',
                        'ID'     => '684503',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'La Mancha Toledana',
                        'ID'     => '684504',
                        'data'   => []
                    ],
                ]
            ],
            'Cataluña'                   => [
                'Barcelona' => [
                    [
                        'Nombre' => 'Prepirineo de Barcelona',
                        'ID'     => '690801',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Depresión Central de Barcelona',
                        'ID'     => '690802',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Prelitoral de Barcelona',
                        'ID'     => '690803',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Litoral de Barcelona',
                        'ID'     => '690804',
                        'data'   => []
                    ],
                ],
                'Girona'    => [
                    [
                        'Nombre' => 'Pirineo de Girona',
                        'ID'     => '691701',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Prelitoral de Girona',
                        'ID'     => '691702',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Ampurdán',
                        'ID'     => '691703',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Litoral sur de Girona',
                        'ID'     => '691704',
                        'data'   => []
                    ],
                ],
                'Lleida'    => [
                    [
                        'Nombre' => 'Valle de Arán',
                        'ID'     => '692501',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Pirineo de Lleida',
                        'ID'     => '692502',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Depresión Central de Lleida',
                        'ID'     => '692503',
                        'data'   => []
                    ],
                ],
                'Tarragona' => [
                    [
                        'Nombre' => 'Depresión Central de Tarragona',
                        'ID'     => '694301',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Prelitoral norte de Tarragona',
                        'ID'     => '694302',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Litoral norte de Tarragona',
                        'ID'     => '694303',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Litoral sur de Tarragona',
                        'ID'     => '694304',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Prelitoral sur de Tarragona',
                        'ID'     => '694305',
                        'data'   => []
                    ],
                ]
            ],
            'Comunitat Valenciana'       => [
                'Alicante'  => [
                    [
                        'Nombre' => 'Litoral norte de Alicante',
                        'ID'     => '770301',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Interior de Alicante',
                        'ID'     => '770302',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Litoral sur de Alicante',
                        'ID'     => '770303',
                        'data'   => []
                    ],
                ],
                'Castellón' => [
                    [
                        'Nombre' => 'Interior norte de Castellón',
                        'ID'     => '771201',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Litoral norte de Castellón',
                        'ID'     => '771202',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Interior sur de Castellón',
                        'ID'     => '771203',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Litoral sur de Castellón',
                        'ID'     => '771204',
                        'data'   => []
                    ],
                ],
                'Valencia'  => [
                    [
                        'Nombre' => 'Interior norte de Valencia',
                        'ID'     => '774601',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Litoral norte de Valencia',
                        'ID'     => '774602',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Interior sur de Valencia',
                        'ID'     => '774603',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Litoral sur de Valencia',
                        'ID'     => '774604',
                        'data'   => []
                    ],
                ]
            ],
            'Extremadura'                => [
                'Badajoz' => [
                    [
                        'Nombre' => 'Vegas del Guadiana',
                        'ID'     => '700601',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'La Siberia extremeña',
                        'ID'     => '700602',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Barros de Serena',
                        'ID'     => '700603',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Sur de Badajoz',
                        'ID'     => '700604',
                        'data'   => []
                    ],
                ],
                'Cáceres' => [
                    [
                        'Nombre' => 'Norte de Cáceres',
                        'ID'     => '701001',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Tajo y Alagón',
                        'ID'     => '701002',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Meseta cacereña',
                        'ID'     => '701003',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Villuercas y Montánchez',
                        'ID'     => '701004',
                        'data'   => []
                    ],
                ]
            ],
            'Galicia'                    => [
                'A Coruña'   => [
                    [
                        'Nombre' => 'Noroeste de A Coruña',
                        'ID'     => '711501',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Oeste de A Coruña',
                        'ID'     => '711502',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Interior de A Coruña',
                        'ID'     => '711503',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Sureste de A Coruña',
                        'ID'     => '711504',
                        'data'   => []
                    ],
                ],
                'Lugo'       => [
                    [
                        'Nombre' => 'A Mariña',
                        'ID'     => '712701',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Centro de Lugo',
                        'ID'     => '712702',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Montaña de Lugo',
                        'ID'     => '712703',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Sur de Lugo',
                        'ID'     => '712704',
                        'data'   => []
                    ],
                ],
                'Ourense'    => [
                    [
                        'Nombre' => 'Noroeste de Ourense',
                        'ID'     => '713201',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Miño de Ourense',
                        'ID'     => '713202',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Sur de Ourense',
                        'ID'     => '713203',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Montaña de Ourense',
                        'ID'     => '713204',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Valdeorras',
                        'ID'     => '713205',
                        'data'   => []
                    ],
                ],
                'Pontevedra' => [
                    [
                        'Nombre' => 'Rias Baixas',
                        'ID'     => '713601',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Interior de Pontevedra',
                        'ID'     => '713602',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Miño de Pontevedra',
                        'ID'     => '713603',
                        'data'   => []
                    ],
                ]
            ],
            'Comunidad de Madrid'        => [
                'Madrid' => [
                    [
                        'Nombre' => 'Sierra de Madrid',
                        'ID'     => '722801',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Metropolitana y Henares',
                        'ID'     => '722802',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Sur, Vegas y Oeste',
                        'ID'     => '722803',
                        'data'   => []
                    ],
                ]
            ],
            'Región de Murcia'           => [
                'Murcia' => [
                    [
                        'Nombre' => 'Altiplano de Murcia',
                        'ID'     => '733001',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Noroeste de Murcia',
                        'ID'     => '733002',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Vega del Segura',
                        'ID'     => '733003',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Valle del Guadalentín, Lorca y Águilas',
                        'ID'     => '733004',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Campo de Cartagena y Manzarrón',
                        'ID'     => '733005',
                        'data'   => []
                    ],
                ]
            ],
            'Comunidad Foral de Navarra' => [
                'Navarra' => [
                    [
                        'Nombre' => 'Vertiente catábrica de Navarra',
                        'ID'     => '743101',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Centro de Navarra',
                        'ID'     => '743102',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Pirineo navarro',
                        'ID'     => '743103',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Ribera del Ebro de Navarra',
                        'ID'     => '743104',
                        'data'   => []
                    ],
                ]
            ],
            'País Vasco'                 => [
                'Álava'    => [
                    [
                        'Nombre' => 'Cuenca del Nervión',
                        'ID'     => '750101',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Llanada alavesa',
                        'ID'     => '750102',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Rioja alavesa',
                        'ID'     => '750103',
                        'data'   => []
                    ],
                ],
                'Bizkaia'  => [
                    [
                        'Nombre' => 'Bizkaia litoral',
                        'ID'     => '754801',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Bizkaia interior',
                        'ID'     => '754802',
                        'data'   => []
                    ],
                ],
                'Gipuzkoa' => [
                    [
                        'Nombre' => 'Gipuzkoa litoal',
                        'ID'     => '752001',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Gipuzkoa interior',
                        'ID'     => '752002',
                        'data'   => []
                    ],
                ]
            ],
            'La Rioja'                   => [
                'La Rioja' => [
                    [
                        'Nombre' => 'Ribera del Ebro de la Rioja',
                        'ID'     => '762601',
                        'data'   => []
                    ],
                    [
                        'Nombre' => 'Ibérica riojana',
                        'ID'     => '762602',
                        'data'   => []
                    ],
                ]
            ],
            'Ceuta'                      => [
                'Ceuta' => [
                    [
                        'Nombre' => 'Ceuta',
                        'ID'     => '785101',
                        'data'   => []
                    ],
                ]
            ],
            'Melilla'                    => [
                'Melilla' => [
                    [
                        'Nombre' => 'Melilla',
                        'ID'     => '795201',
                        'data'   => []
                    ],
                ]
            ],
        ];
    }
}
