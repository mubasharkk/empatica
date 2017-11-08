<?php

namespace App\Services\Dashboard;

final class DashboardRepository
{
    public function fetchPeekHourDownloadData()
    {
        return \DB::select(
            "SELECT hour(created_at) dayHour, app_id, count(*) as total FROM app_downloads GROUP BY hour( created_at ) , app_id"
        );
    }
}