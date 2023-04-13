<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Artisan;
use App\Models\HomeBanner;
use App\Models\HomeAboutIcon;
use App\Models\AboutBanner;
use App\Models\Service;
use App\Models\WorkingProcess;

class HomeController extends Controller
{
    public function Home()
    {
        Artisan::call('view:clear');
        Artisan::call('route:clear');

        $banner = HomeBanner::first();
        $homeAboutIcon = HomeAboutIcon::OrderBy('id','DESC')->limit(7)->get();
        $aboutBanner = AboutBanner::first();
        $service= Service::OrderBy('id','DESC')->get();
        $workingProcess = WorkingProcess::all();
        return view('front.home',compact('banner','homeAboutIcon','aboutBanner','service','workingProcess'));
    }

    public function Resume(Request $request)
    {
        $file="storage/aboutBanner/Resume.pdf";
        return Response::download($file);
    }
}
