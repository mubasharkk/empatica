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
            return $this->buildMobileApp($app);
        });
    }

    /**
     * @param MobileApp $app
     * @return Dto\MobileApp
     */
    private function buildMobileApp(MobileApp $app)
    {
        return new \App\Services\MobileApp\Dto\MobileApp(
            $app->id,
            $app->status,
            $app->created_at,
            $app->created_by
        );
    }

    /**
     * @param string $appId
     * @param int $userId
     * @return int
     */
    public function add($appId, $status, $userId)
    {
        $mobileApp = new MobileApp();
        $mobileApp->id = $appId;
        $mobileApp->status = $status;
        $mobileApp->created_by = $userId;
        $mobileApp->save();

        return $mobileApp->id;
    }

    public function delete($appId)
    {
        $app = MobileApp::find($appId);
        $app->delete();
    }
}