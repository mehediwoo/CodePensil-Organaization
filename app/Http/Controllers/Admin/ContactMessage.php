<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contact;

class ContactMessage extends Controller
{
    public function unRead()
    {
        $message = contact::where('status','0')->paginate(10);
        return view('admin.contact.index', compact('message'));
    }

    public function Read()
    {
        $message = contact::where('status','1')->paginate(10);
        return view('admin.contact.read', compact('message'));
    }

    public function ViewMessage($id)
    {
        $message = contact::findOrFail($id);
        return view('admin.contact.view',compact('message'));
    }

    public function MarkAsRead($id)
    {
        $status = contact::findOrFail($id);
        $status->status='1';
        $result = $status->update();
        if($result){
            return redirect()->back()->with('success','Mark as Read Successfully!');
        }{
            return redirect()->back()->with('error','Error, Try again for mark as read');
        }
    }
}
