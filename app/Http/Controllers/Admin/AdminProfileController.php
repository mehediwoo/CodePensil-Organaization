<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;

class AdminProfileController extends Controller
{
    public function Index()
    {
        $id = Auth::user()->id;
        $user_data = User::findOrFail($id);
        return view('admin.profile.index',compact('user_data'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'profileImage' => 'image',
        ]);

        $id   = Auth::user()->id;
        $data = User::findOrFail($id);
        $data->name = $request->input('name');

        $folder = "admin_profile";
        if (!file_exists(base_path('storage/app/public/') . $folder)) {
            mkdir(base_path('storage/app/public/') . $folder, 666, true);
        }
        if($request->hasFile('profileImage')){
            if (file_exists('storage/'.$data->profile_image) && $data->profile_image != '') {
                unlink('storage/'.$data->profile_image);
            }
            $file = $request->file('profileImage');
            $name = Str::random(30);
            $ext  = $file->extension();
            $fullName = $name . '.' .$ext;
            $file->storeAs('public/'.$folder.'/', $fullName);
            $data->profile_image = $folder. '/'.$fullName;
        }
        $result = $data->update();
        if($result==true){
            return redirect()->route('admin.profile')->with('success','Profile Successfully Updated');
        }else{
            return redirect()->route('admin.profile')->with('error','Profile Not Updated!');
        }

    }
}
