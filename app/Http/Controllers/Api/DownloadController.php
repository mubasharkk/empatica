<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\LocationNotFound;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDownloadRequest;
use App\Services\Downloads\Service;
use Illuminate\Http\Request;

final class DownloadController extends Controller
{
    /**
     * @param Service $service
     */
    public function index(Service $service)
    {
        $service->addDownloadEntry('IOS_ALERT', 52.5200, 13.4050);
    }

    public function store(StoreDownloadRequest $request, Service $service)
    {
        try {
            $id = $service->addDownloadEntry(
                $request->input('app_id'),
                $request->input('latitude'),
                $request->input('longitude')
            );
            $responseData = [
                'id' => $id,
                'status' => true,
                'created' => time()
            ];
        } catch (LocationNotFound $exception){
            $responseData = [
                'status' => false,
                'created' => time(),
                'errors' => [
                    $exception->getMessage()
                ],
            ];
        }

        return response()->json($responseData);

    }
}