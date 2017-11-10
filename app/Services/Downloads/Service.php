<?php

namespace App\Services\Downloads;

use App\Exceptions\LocationNotFound;
use Geocoder\Geocoder;
use Geocoder\Provider\GoogleMaps\Model\GoogleAddress;

final class Service
{
    /**
     * @var Geocoder
     */
    private $geoCoder;

    /**
     * @var AppDownloadRepository
     */
    private $repository;

    /**
     * @param AppDownloadRepository $repository
     */
    public function __construct(AppDownloadRepository $repository)
    {
        $this->geoCoder = app('geocoder');
        $this->repository = $repository;
    }

    /**
     * @param string $appId
     * @param string $latitude
     * @param string $longitude
     * @return null|string
     *
     * @throws LocationNotFound
     */
    public function addDownloadEntry($appId, $latitude, $longitude)
    {
        try {
            /** @var GoogleAddress $geoCodedData */
            $geoCodedData = $this->geoCoder->reverse($latitude, $longitude)->get(0)->first();

            if (!$geoCodedData) {
                throw new LocationNotFound();
            }

            $entryId = $this->repository->add(
                $appId,
                $latitude,
                $longitude,
                $geoCodedData->getCountry()->getName(),
                $geoCodedData->getLocality(),
                $geoCodedData->getPostalCode()
            );

        } catch (\Exception $exception) {
            throw new LocationNotFound();
        }

        return $entryId;
    }

    public function getAll()
    {
        $data = array_map(function ($item) {
            return [
                'id' => $item['id'],
                'app' => $item['type'],
                'country' => $item['location']->country(),
                'address' => (string)$item['location'],
                'created' => $item['created']->timestamp
            ];
        }, $this->repository->fetchAll()->toArray());

        return [
            'data' => $data,
            'columns' => array_map(function($key) {
                return [
                    'name' => $key,
                    'label' => trans('common.downloads.'.$key)
                ];
            } , array_keys(head($data)))
        ];
    }

    public function getByApp($appId)
    {
        return $this->repository->fetchByAppId($appId);
    }
}