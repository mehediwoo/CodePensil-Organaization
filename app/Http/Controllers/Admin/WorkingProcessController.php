<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use App\Models\WorkingProcess;

class WorkingProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $work = WorkingProcess::all();
        return view('admin.working.index',compact('work'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.working.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'level' => ['required','integer'],
            'title' => ['required'],
            'logo' => ['required','image'],
            'description' => ['required'],
        ]);

        $work = WorkingProcess::all();

        if($work->count() > 3){
            return redirect()->route('working-process.index')->with('error','Out of limit !');
        }else{

            $data = new WorkingProcess;
            $data->lavel = $request->input('level');
            $data->title = $request->input('title');
            $data->shortDescription = $request->input('description');
            $folder = 'workIcon';
            if(!file_exists(base_path('storage/app/public/'.$folder))){
                mkdir(base_path('storage/app/public/').$folder);
            }
            if($request->hasFile('logo')){
                $logo = $request->file('logo');
                $name = Str::random(10). '.'.$logo->extension();
                $img  = Image::make($logo)->resize(112,112);
                $img->save(base_path('storage/app/public/'.$folder.'/'.$name));
                $data->logo = $folder.'/'.$name;
            }

            $result = $data->save();
            if($result==true){
                return redirect()->route('working-process.index')->with('success','Successfully create working process');
            }else{
                return redirect()->route('working-process.index')->with('error','Error, Please try again now!');
            }
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
        $edit = WorkingProcess::findOrFail($id);
        return view('admin.working.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'level' => ['required','integer'],
            'title' => ['required'],
            'description' => ['required'],
        ]);

            $data = WorkingProcess::findOrFail($id);
            $data->lavel = $request->input('level');
            $data->title = $request->input('title');
            $data->shortDescription = $request->input('description');
            $folder = 'workIcon';
            if(!file_exists(base_path('storage/app/public/'.$folder))){
                mkdir(base_path('storage/app/public/').$folder);
            }
            if($request->hasFile('logo')){
                if(file_exists('storage/'.$data->logo) && $data->logo != ''){
                    unlink('storage/'.$data->logo);
                }
                $logo = $request->file('logo');
                $name = Str::random(10). '.'.$logo->extension();
                $img  = Image::make($logo)->resize(112,112);
                $img->save(base_path('storage/app/public/'.$folder.'/'.$name));
                $data->logo = $folder.'/'.$name;
            }

            $result = $data->update();
            if($result==true){
                return redirect()->route('working-process.index')->with('success','Successfully Updated working process');
            }else{
                return redirect()->route('working-process.index')->with('error','Error, Please try again now!');
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = WorkingProcess::findOrFail($id);
        $result = $delete->delete();
        if($result==true){
            if (file_exists('storage/'.$delete->logo) && $delete->logo != '') {
                unlink('storage/'.$delete->logo);
            }
            return redirect()->route('working-process.index')->with('success','Successfully create working process');
        }else{
            return redirect()->route('working-process.index')->with('error','Error, Please try again now!');
        }
    }
}
