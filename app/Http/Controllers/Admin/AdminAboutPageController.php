<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use App\Models\AboutBanner;
use App\Models\About;
use App\Models\skill;
use App\Models\Award;
use App\Models\Education;

class AdminAboutPageController extends Controller
{
    public function AboutBanner()
    {
        $AboutBanner = AboutBanner::findOrFail(1);
        return view('admin.AboutPage.Banner', compact('AboutBanner'));
    }

    public function Store(Request $request)
    {
        $validated = $request->validate([
            'banner' => 'image',
            'badgeIcon' => 'image',
            'Resume' => 'file|mimes:pdf'
        ]);
        $id = $request->input('id');
        $aboutBanner = AboutBanner::findOrFail($id);
        $aboutBanner->title    = $request->input('title');
        $aboutBanner->subtitle = $request->input('subTitle');
        $aboutBanner->desc     = $request->input('description');

        $folder = "aboutBanner";
        if(!file_exists(base_path('storage/app/public/'.$folder))){
            mkdir(base_path('storage/app/public/').$folder);
        }
        if($request->hasFile('banner')){
            if (file_exists('storage/'.$aboutBanner->banner) && $aboutBanner->banner != '') {
                unlink('storage/'.$aboutBanner->banner);
            }
            $banner = $request->file('banner');
            $name   = 'banner'.Str::random(30).'.'.$banner->extension();
            $img = Image::make($banner)->resize(636, 852);
            $img->save(base_path('storage/app/public/'.$folder.'/'.$name));
            $aboutBanner->banner = $folder.'/'.$name;
        }
        if($request->hasFile('badgeIcon')){
            if (file_exists('storage/'.$aboutBanner->logo) && $aboutBanner->logo != '') {
                unlink('storage/'.$aboutBanner->logo);
            }
            $badge  = $request->file('badgeIcon');
            $name   = 'badge'.Str::random(30).'.'.$badge->extension();
            $img = Image::make($badge)->resize(82, 108);
            $img->save(base_path('storage/app/public/'.$folder.'/'.$name));
            $aboutBanner->logo = $folder.'/'.$name;
        }
        if($request->hasFile('Resume')){
            if (file_exists('storage/'.$aboutBanner->resume) && $aboutBanner->resume != '') {
                unlink('storage/'.$aboutBanner->resume);
            }
            $resume  = $request->file('Resume');
            $name   = 'Resume'.'.'.$resume->extension();
            $resume->storeAs('public/'.$folder.'/'.$name);
            $aboutBanner->resume = $folder.'/'.$name;
        }

        $result = $aboutBanner->update();
        if($result==true){
            return redirect()->back()->with('success','Successfully updated about banner ');
        }else{
            return redirect()->back()->with('error','Error, Please try again now!');
        }

    }

    public function Details()
    {
        $about = About::findOrFail(1);
        $skill = skill::OrderBy('id','DESC')->paginate(10);
        $award = Award::OrderBy('id','DESC')->paginate(10);
        $education = Education::OrderBy('id','DESC')->paginate(10);
        return view('admin.AboutPage.AboutDetails', compact('about','skill','award','education'));
    }

    public function AboutStore(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required',
        ]);
        $id = $request->input('id');
        $about = About::findOrFail($id);
        $about->description = $request->input('description');
        $result = $about->update();
        if($result==true){
            return redirect()->back()->with('success','Successfully save about details ');
        }else{
            return redirect()->back()->with('error','Error, Please try again now!');
        }
    }

    public function Skill(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'progress' => 'required|integer',
        ]);

        $skill = new skill;
        $skill->name    = $request->input('name');
        $skill->percent = $request->input('progress');
        $result = $skill->save();
        if($result==true){
            return redirect()->back()->with('success','Successfully save work skill ');
        }else{
            return redirect()->back()->with('error','Error, Please try again now!');
        }
    }

    public function SkillDelete($id)
    {
        $delete = skill::findOrFail($id);
        $result = $delete->delete();
        if($result==true){
            return redirect()->back()->with('success','Iteam Delete Successfully');
        }else{
            return redirect()->back()->with('error','Error, Iteam not deleted!');
        }
    }

    public function AwardStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = new Award;
        $data->title = $request->input('title');
        $data->description = $request->input('description');
        $result = $data->save();
        if($result==true){
            return redirect()->back()->with('success','Award data successfully inserted');
        }else{
            return redirect()->back()->with('error','Error, Try again now!');
        }
    }

    public function AwardDelete($id)
    {
        $delete = Award::findOrFail($id);
        $result = $delete->delete();
        if($result==true){
            return redirect()->back()->with('success','Iteam Delete Successfully');
        }else{
            return redirect()->back()->with('error','Error, Iteam not deleted!');
        }
    }

    public function EducationStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'year' => 'required',
            'description' => 'required',
        ]);

        $data = new Education;
        $data->orga_name = $request->input('name');
        $data->year = $request->input('year');
        $data->description = $request->input('description');
        $result = $data->save();
        if($result==true){
            return redirect()->back()->with('success','Education data successfully inserted');
        }else{
            return redirect()->back()->with('error','Error, Try again now!');
        }
    }

    public function EducationDelete($id)
    {
        $delete = Education::findOrFail($id);
        $result = $delete->delete();
        if($result==true){
            return redirect()->back()->with('success','Iteam Delete Successfully');
        }else{
            return redirect()->back()->with('error','Error, Iteam not deleted!');
        }
    }


}
