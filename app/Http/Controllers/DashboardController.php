<?php

namespace App\Http\Controllers;

final class DashboardController extends Controller
{
    public function index()
    {
       \JavaScript::put([
            'GOOGLE_MAP_API_KEY' => config('geocoder.apiKey')
        ]);

        return view('pages.dashboard.welcome');
    }
}