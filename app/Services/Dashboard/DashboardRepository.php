<?php

namespace App\Services\Dashboard;

use App\AppDownload;

final class DashboardRepository
{
    public function fetchPeekHourDownloadData()
    {
        return \DB::select(
            "SELECT hour(created_at) dayHour, app_id, count(*) as total FROM app_downloads GROUP BY hour( created_at ) , app_id"
        );
    }

    public function fetchDownloadsByCountry()
    {
        return AppDownload::groupBy('country', 'app_id')
            ->select(\DB::raw('count(id) as total, country, app_id'))
            ->orderBy('app_id', 'DESC')
            ->get();
    }
}