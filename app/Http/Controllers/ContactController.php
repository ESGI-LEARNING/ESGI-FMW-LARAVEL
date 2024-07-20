<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact.show');
    }

    public function submit(Request $request)
    {
        // Valider les données
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        return redirect()->route('contact.show')->with('success', 'Votre message a été envoyé avec succès.');
    }
}
