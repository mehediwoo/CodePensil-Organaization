<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutBanner;
use App\Models\HomeAboutIcon;
use App\Models\About;
use App\Models\skill;
use App\Models\Award;
use App\Models\Education;
use App\Models\Service;

class AboutController extends Controller
{
    public function About()
    {
        $bannerData = AboutBanner::first();
        $icon = HomeAboutIcon::OrderBy('id','DESC')->limit(6)->get();
        $about = About::first();
        $skill = skill::OrderBy('id','DESC')->get();
        $award = Award::OrderBy('id','DESC')->get();
        $educa = Education::OrderBy('id','DESC')->get();
        $service= Service::OrderBy('id','DESC')->get();
        return view('front.about',compact('bannerData','icon','about','skill','award','educa','service'));
    }

    public function ServiceDetails($id)
    {
        $icon = HomeAboutIcon::OrderBy('id','DESC')->limit(6)->get();
        $service = Service::findOrFail($id);
        return view('front.service.index',compact('icon','service'));
    }
}
