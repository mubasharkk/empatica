<?php

namespace App\Services\MobileApp;

use App\MobileApp;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

final class Repository
{
    /**
     * @return Collection
     */
    public function fetchAll()
    {
        return MobileApp::get()->map(function (MobileApp $app){
            return new \App\Services\MobileApp\Dto\MobileApp(
                $app->id,
                $app->app_id,
                $app->created_at,
                $app->created_by
            );
        });
    }

    /**
     * @param string $appId
     * @param int $userId
     * @return int
     */
    public function add($appId, $userId)
    {
        $mobileApp = new MobileApp();
        $mobileApp->app_id = $appId;
        $mobileApp->created_by = $userId;
        $mobileApp->save();

        return $mobileApp->id;
    }
}