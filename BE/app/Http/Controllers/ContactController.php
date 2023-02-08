<?php

namespace App\Http\Controllers;

use App\Models\Message;

class ContactController extends Controller
{
    public function index()
    {
        $allMessages = Message::all();
        return view('contact', ['messages' => $allMessages]);
    }
    public function showEdit($id)
    {
        $myMessage = Message::find($id);
        return view('editMessage', ['message' => $myMessage]);
    }
}
