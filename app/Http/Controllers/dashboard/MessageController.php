<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Contact::latest()->get();
        return view('dashboard.pages.message', [
            'messages' => $messages
        ]);
    }
    public function delete(Request $request, $id)
    {
        Contact::where('id', $id)->delete();
        return redirect('/messages')->with('deletemessage', 'Messages is Deleted Successfully!!!');
    }
}
