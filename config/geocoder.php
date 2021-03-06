<?php

/**
 * This file is part of the GeocoderLaravel library.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Geocoder\Provider\Chain\Chain;
use Geocoder\Provider\GeoPlugin\GeoPlugin;
use Geocoder\Provider\GoogleMaps\GoogleMaps;
use Http\Client\Curl\Client;

return [
    'cache-duration' => 9999999,
    'providers' => [
        Chain::class => [
            GoogleMaps::class => [
                'en-US',
                env('GOOGLE_MAPS_API_KEY', 'AIzaSyBf_Vb_LjkARy7MGGlFlGJvbtzi9uzJzT0'),
            ],
            GeoPlugin::class  => [],
        ],
    ],
    'adapter'  => Client::class,
    'apiKey' => 'AIzaSyBf_Vb_LjkARy7MGGlFlGJvbtzi9uzJzT0'
];
