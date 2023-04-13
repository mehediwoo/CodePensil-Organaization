<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Dashboard()
    {
        Artisan::call('view:clear');
        // Artisan::call('cache:clear');
        // Artisan::call('config:cache');
        Artisan::call('route:clear');
        return view('admin.index');
    }
}
