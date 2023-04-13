<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.settings.index',compact('setting'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'phoneNumber' => 'required',
            'description' => 'required',
            'country' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'social_description' => 'required',
            'facebook' => 'required|url',
            'twitter' => 'required|url',
            'linkedIn' => 'required|url',
            'instagram' => 'required|url',
            'copyright' => 'required',
        ]);

        $id = $request->input('id');

        $setting = Setting::findOrFail($id);
        $setting->number = $request->input('phoneNumber');
        $setting->desc = $request->input('description');
        $setting->country = $request->input('country');
        $setting->address = $request->input('address');
        $setting->email = $request->input('email');
        $setting->soci_desc = $request->input('social_description');
        $setting->facebook_url = $request->input('facebook');
        $setting->twitter_url = $request->input('twitter');
        $setting->linkedIn_url = $request->input('linkedIn');
        $setting->instagram_url = $request->input('instagram');
        $setting->copyrightText = $request->input('copyright');
        $result = $setting->update();
        if($result==true){
            return redirect()->route('setting.index')->with('success','Setting change successfully!');
        }else{
            return redirect()->route('setting.index')->with('error','Setting not change!');
        }

    }

    public function SettingLogo()
    {
        $logo = Setting::findOrFail(1);
        return view('admin.settings.logo', compact('logo'));
    }

    public function LogoStore(Request $request)
    {

        $id = $request->input('id');

        $setting = Setting::findOrFail($id);

        $folder = "logo";
        if(!file_exists(base_path('storage/app/public/'.$folder))){
            mkdir(base_path('storage/app/public/').$folder);
        }

        if($request->hasFile('logo')){
            if (file_exists('storage/'.$setting->logo) && $setting->logo != '') {
                unlink('storage/'.$setting->logo);
            }
            $logo = $request->file('logo');
            $name   = 'logo'.Str::random(30).'.'.$logo->extension();
            $img = Image::make($logo)->resize(394, 94);
            $img->save(base_path('storage/app/public/'.$folder.'/'.$name));
            $setting->logo = $folder.'/'.$name;
        }

        $result = $setting->update();
        if($result==true){
            return redirect()->route('setting.logo')->with('success','Logo Change successfully!');
        }else{
            return redirect()->route('setting.logo')->with('error','Error to change setting!');
        }
    }
}
