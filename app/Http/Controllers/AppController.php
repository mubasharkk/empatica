<?php

namespace App\Http\Controllers;

use App\Http\Requests\MobileAppCreateRequest;
use App\Services\MobileApp\Service;
use Illuminate\Support\Facades\Request;

final class AppController extends Controller
{
    public function index(Service $service)
    {
        return view('pages.app.list', [
            'list' => $service->listAll()->toArray()
        ]);
    }

    public function create()
    {
        return view('pages.app.create');
    }

    public function store(MobileAppCreateRequest $request, Service $service)
    {
        $service->createNewApp($request->input('app_id'), $request->input('status'), null);
        return redirect()->route('apps.index');
    }

    public function destroy($appId, Service $service)
    {
        $service->deleteApp($appId);
        return redirect()->route('apps.index');
    }
}