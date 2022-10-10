<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        return view('contact.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:16|alpha',
            'name_kana' => 'required|string|max:16|alpha',
            'phone' => 'required',
            'email' => 'required|string|email',
            'body' => 'required|string|max:500',
        ]);
        return redirect()->route('contact');
    }

    public function create(Request $request)
    {

    } 

    public function complete()
    {
        return view('contact.complete');
    }
}
