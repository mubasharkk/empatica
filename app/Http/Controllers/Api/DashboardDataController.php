<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\Service;

final class DashboardDataController extends Controller
{
    /**
     * @var Service
     */
    private $service;

    /**
     * @param Service $service
     */
    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    /**
     * @param string $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($type)
    {
        $data = [
            'status' => true,
            'data' => []
        ];

        switch ($type) {
            case 'peek-hours':
                $data['data'] = $this->graphPeekHours();
                break;
        }

        return response()->json($data);
    }

    /**
     * @return array
     */
    private function graphPeekHours()
    {
        return $this->service->peekHours();
    }
}