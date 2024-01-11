<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contacts.show');
    }

    public function submit(ContactRequest $request)
    {
        $mailReceiver = config('mail.from.address');
        $mailContent = $request->input('content');

        $name = auth()->user()->name;
        $mailSender = auth()->user()->email;

        Mail::to($mailReceiver)->send(new ContactMail($name, $mailSender, $mailContent));

        return to_route('contact.show')->with('success', 'Your message has been sent successfully!');
    }
}
