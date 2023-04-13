<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use App\Models\HomeBanner;
use App\Models\HomeAboutIcon;

class HomePageController extends Controller
{
    public function HomeBanner()
    {
        $bannerData = HomeBanner::findOrFail(1);
        return view('admin.HomePage.Banner',compact('bannerData'));
    }

    public function Store(Request $request,$id)
    {
        $validated = $request->validate([
            'video_url' => 'url',
            'banner' => 'image',
        ]);

        $banner = HomeBanner::findOrFail(1);
        $banner->title      = $request->input('title');
        $banner->desc       = $request->input('description');
        $banner->video_url  = $request->input('video_url');

        $folder = 'Home_Banner';
        if(!file_exists(base_path('storage/app/public/'.$folder))){
            mkdir(base_path('storage/app/public/').$folder);
        }
        if($request->hasFile('banner')){
            if (file_exists('storage/'.$banner->image) && $banner->image != '') {
                unlink('storage/'.$banner->image);
            }
            $file = $request->file('banner');
            $name = Str::random(30);
            $ext  = $file->extension();
            $bannerName = $name.'.'.$ext;
            $img = Image::make($file)->resize(636, 852);
            $img->save(base_path('storage/app/public/'.$folder.'/'.$bannerName));
            $banner->image = $folder.'/'.$bannerName;
        }
        $result = $banner->update();
        if($result==true){
            return redirect()->route('home.banner')->with('success','Banner Successfully Updated');
        }else{
            return redirect()->route('home.banner')->with('error','Something Wrong, try again!');
        }
    }

    public function HomeAbout()
    {
        $icon = HomeAboutIcon::OrderBy('id')->paginate(10);
        return view('admin.HomePage.HomeAbout',compact('icon'));
    }

    public function StoreIcon(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'required|image',
        ]);

        $insert = new HomeAboutIcon;

        $folder = "HomeAboutIcon";
        if (!file_exists(base_path('storage/app/public/'.$folder))) {
            mkdir(base_path('storage/app/public/'.$folder));
        }

        $icon = $request->file('icon');
        $name = Str::random(30). '.' .$icon->extension();
        Image::make($icon)->resize(220,220)->save(base_path('storage/app/public/'.$folder.'/'.$name));
        $url = $folder.'/'.$name;

        $insert->icon = $url;
        $result = $insert->save();
        if($result==true){
            return redirect()->route('home.about')->with('success','Icon successfully uploaded!');
        }else{
            return redirect()->route('home.about')->with('error','something wrong, try again now!');
        }
    }

    public function Destroy($id)
    {
        $icon = HomeAboutIcon::findOrFail($id);
        if($icon==true){
            $result = $icon->delete();
            unlink('storage/'.$icon->icon);
            return redirect()->route('home.about')->with('success','Icon Delete Successfully!');
        }else{
            return redirect()->route('home.about')->with('error','Not Found!');
        }

    }
}
