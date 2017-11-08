<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

final class DashboardDataController extends Controller
{
    public function index($type)
    {
        return response()->json();
    }
}