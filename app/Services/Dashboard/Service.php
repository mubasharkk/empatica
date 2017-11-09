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
                'count' => $item->total + rand(0,10)
            ];
        }

        return array_values($data);
    }
}