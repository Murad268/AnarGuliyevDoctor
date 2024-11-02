<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        // Form verilerini doğrulama
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date' => 'required|date_format:m/d/Y',
            'time' => 'required|date_format:H:i',
        ]);

        // Tarih ve saati birleştirerek datetime formatına dönüştürme
        $appointmentDate = Carbon::createFromFormat('m/d/Y H:i', $request->input('date') . ' ' . $request->input('time'));

        // Appointment modeline form verilerini kaydetme
        Appointment::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'appointment_date' => $appointmentDate,
        ]);

        // JSON olarak başarılı yanıt döndürme
        return response()->json(['success' => true, 'message' => 'Appointment created successfully!']);
    }
}
