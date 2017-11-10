<?php

namespace App\Services\Dashboard;

final class Service
{
    /**
     * @var DashboardRepository
     */
    private $repository;

    /**
     * @param DashboardRepository $repository
     */
    public function __construct(DashboardRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function peekHours()
    {
        $rawData = $this->repository->fetchPeekHourDownloadData();
        $data = [];
        foreach ($rawData as $item) {
            if (!isset($data[$item->app_id])) {
                $data[$item->app_id] = [
                    'name' => $item->app_id,
                    'points' => []
                ];
            }

            $data[$item->app_id]['points'][$item->dayHour] = [
                'hour' => $item->dayHour,
                'count' => $item->total
            ];
        }

        return array_values($data);
    }

    public function downloadsByCountry()
    {
        $rawData = $this->repository->fetchDownloadsByCountry();

        $data = [];

        foreach ($rawData as $dt){
            $data[$dt->country][] = [
                'name' => $dt->country,
                'appType' => $dt->app_id,
                'total' => $dt->total
            ];
        }

        return $data;
    }

    /**
     * @return array
     */
    public function appsDownloadsPopularity()
    {
        $rawData = $this->repository->fetchDownloadCountsByApp();

        return $rawData->map(function ($item) {
            return [
                'name' => $item->app_id,
                'total' => $item->total
            ];
        });
    }
}