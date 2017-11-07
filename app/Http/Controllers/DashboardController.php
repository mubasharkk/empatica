<?php

namespace App\Http\Controllers;

final class DashboardController extends Controller
{
    public function index()
    {
       \JavaScript::put([
            'mubashar' => 'Khokhar'
        ]);

        return view('pages.dashboard.welcome');
    }
}