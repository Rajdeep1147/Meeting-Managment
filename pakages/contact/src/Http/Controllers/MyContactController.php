<?php

namespace Bitfuses\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Bitfuses\Contact\Mail\ContactMail;
use Bitfuses\Contact\Models\Contact;
use Illuminate\Http\Request;
use Mail;

class MyContactController extends Controller
{
    public function index()
    {
        return view('contact::contact');

    }

    public function send(Request $request)
    {
        $details = [
            'message' => $request->message,
            'name' => $request->name,
        ];
        Mail::to(config('contact.send_email_to'))->send(new ContactMail($details['message']));
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        if ($contact->save()) {
            return redirect(route('contact'));
        }
    }
}
