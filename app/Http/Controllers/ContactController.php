<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\contact;
class ContactController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('front.contact',compact('setting'));
    } // end index

    public function message(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'phone' => 'required|min:11|numeric',
            'message' => 'required',
        ]);

        $message = new contact;
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->subject = $request->input('subject');
        $message->phone = $request->input('phone');
        $message->message = $request->input('message');
        $result = $message->save();
        if($result){
            return redirect()->route('contact')->with('success','Message sent successfully!');
        }else{
            return redirect()->route('contact')->with('error','Message not sent try again!');
        }



    }
}
