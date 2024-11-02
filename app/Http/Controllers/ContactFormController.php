<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'email',
            'phone' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
        ]);

        ContactForm::create($validated);

        return response()->json(['success' => true, 'message' => 'Form submitted successfully!']);
    }
}
