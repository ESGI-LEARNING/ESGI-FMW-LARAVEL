<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMessage;
use Illuminate\Http\Request;
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

        Mail::to($details['email'])
            ->queue(new ContactMessage($details));

        return redirect()->route('contact.show')
            ->with('success', 'Votre message a été envoyé avec succès.');
    }
}
