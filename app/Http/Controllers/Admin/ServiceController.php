<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Service;
use Image;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service = Service::OrderBy('id','DESC')->paginate(10);
        return view('admin.service.index',compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => ['required'],
            'logo' => ['required','mimes:png,jpg,jpeg','image'],
            'images' => ['required','image'],
            'description' => ['required'],
        ]);

        $service = new Service;
        $service->title = $request->input('title');
        $service->description = $request->input('description');

        $folder = "service";
        if(!file_exists(base_path('storage/app/public/').$folder)){
            mkdir(base_path('storage/app/public/'.$folder));
        }

        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $name = 'logo-'.Str::random(5). '.'.$logo->extension();
            $img = Image::make($logo)->resize(82,82);
            $img->save(base_path('storage/app/public/'.$folder.'/'.$name));
            $service->logo = $folder.'/'.$name;
        }

        if($request->hasFile('images')){
            $images = $request->file('images');
            $name = 'Images-'.Str::random(5). '.'.$images->extension();
            $img = Image::make($images)->resize(850,430);
            $img->save(base_path('storage/app/public/'.$folder.'/'.$name));
            $service->image = $folder.'/'.$name;
        }
        $result = $service->save();
        if($result==true){
            return redirect()->route('services.index')->with('success','Services Created Successfully!');
        }else{
            return redirect()->back()->with('error','Error to create services, please try again');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $edit_service = Service::findOrFail($id);
        return view('admin.service.edit',compact('edit_service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validate = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
        ]);

        $service = Service::findOrFail($id);
        $service->title = $request->input('title');
        $service->description = $request->input('description');

        $folder = "service";

        if($request->hasFile('logo')){
            if(file_exists('storage/'.$service->logo) && $service->logo != ''){
                unlink('storage/'.$service->logo);
            }
            $logo = $request->file('logo');
            $name = 'logo-'.Str::random(5). '.'.$logo->extension();
            $img = Image::make($logo)->resize(82,82);
            $img->save(base_path('storage/app/public/'.$folder.'/'.$name));
            $service->logo = $folder.'/'.$name;
        }

        if($request->hasFile('images')){
            if(file_exists('storage/'.$service->image) && $service->image != ''){
                unlink('storage/'.$service->image);
            }
            $images = $request->file('images');
            $name = 'Images-'.Str::random(5). '.'.$images->extension();
            $img = Image::make($images)->resize(850,430);
            $img->save(base_path('storage/app/public/'.$folder.'/'.$name));
            $service->image = $folder.'/'.$name;
        }
        $result = $service->update();
        if($result==true){
            return redirect()->route('services.index')->with('success','Services Updated Successfully!');
        }else{
            return redirect()->back()->with('error','Error to create services, please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $result = $service->delete();
        if($result==true){
            if(file_exists('storage/'.$service->logo) or $service->logo != ''){
                unlink('storage/'.$service->logo);
            }
            if(file_exists('storage/'.$service->image) or $service->image != ''){
                unlink('storage/'.$service->image);
            }
            return redirect()->route('services.index')->with('success','Services Delete Successfully!');
        }else{
            return redirect()->route('services.index')->with('error','Something Wrong, try again!');
        }
    }
}
