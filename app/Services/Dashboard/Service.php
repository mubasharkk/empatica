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
            if (!isset($data[$item->dayHour])) {
                $data[$item->dayHour] = [
                    'hour' => $item->dayHour,
                ];
            }

            if (isset( $data[$item->dayHour][$item->app_id])) {
                $data[$item->dayHour][$item->app_id] += $item->total;
            } else {
                $data[$item->dayHour][$item->app_id] = $item->total;
            }
        }

        return array_map(function($item) {
            ksort($item);
            return $item;
        }, $data);
    }
}