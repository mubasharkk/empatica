<?php

namespace App\Services\Downloads;

use App\AppDownload;
use App\Services\Downloads\Dto\Location;
use Carbon\Carbon;

final class AppDownloadRepository
{
    /**
     * @param string $appId
     * @param string $latitude
     * @param string $longitude
     * @param string|null $country
     * @param string|null $city
     * @param string|null $postalCode
     * @return int
     */
    public function add($appId, $latitude, $longitude, $country = null, $city = null, $postalCode = null)
    {
        $entity = new AppDownload();
        $entity->app_id = $appId;
        $entity->latitude = $latitude;
        $entity->longitude = $longitude;
        $entity->country = $country;
        $entity->city = $city;
        $entity->postal_code = $postalCode;

        $entity->save();

        return $entity->id;
    }

    public function fetchAll()
    {
        return AppDownload::orderBy('created_at', 'DESC')->get()->map(function (AppDownload $item) {
            return $this->buildAppDownload($item);
        });
    }

    private function buildAppDownload(AppDownload $item)
    {
        return new \App\Services\Downloads\Dto\AppDownload(
            $item->id,
            $item->app_id,
            new Location($item->country, $item->city, $item->postal_code),
            $item->created_at,
            [
                'latitude' => $item->latitude,
                'longitude' => $item->longitude
            ]
        );
    }

    public function fetchByAppId($appId)
    {
        return AppDownload::where('app_id', $appId)->get()->map(function (AppDownload $item) {
            return $this->buildAppDownload($item);
        });
    }
}