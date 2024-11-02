<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\Phone;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $emails = Email::all();
        $phones = Phone::all();
        return view('pages.contact', compact('emails', 'phones'));
    }
}
