<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact.show');
    }

    public function submit(ContactRequest $request)
    {
        $details = [
            'name'    => $request->name,
            'email'   => $request->email,
            'message' => $request->message,
        ];

        Mail::to('contact@theomeunier.fr')
            ->queue(new ContactMessage($details));

        return redirect()->route('contact.show')
            ->with('success', 'Votre message a été envoyé avec succès.');
    }
}
