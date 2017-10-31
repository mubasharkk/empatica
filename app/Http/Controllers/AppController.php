<?php

namespace App\Http\Controllers;

use App\Http\Requests\MobileAppCreateRequest;
use App\Services\Downloads\Service;

final class AppController extends Controller
{
    public function index(Service $service)
    {
        $list = $service->get();
    }

    public function create()
    {
        return view('pages.app.create');
    }

    public function store(MobileAppCreateRequest $request)
    {
        dd($request->all());
    }
}