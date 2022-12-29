<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\Test;
use App\Models\Contact;
class ContactController extends Controller
{
    //
    public function create(){
        return view('contact');
    }
    public function store(){
        Contact::create(request()->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email' => 'required',
            'subject' => 'nullable|min:5|max:50',
            'message' => 'required|min:5|max:300',
        ])
        );

        Mail::to("abdelhameed9@yahoo.com")->send(new Test('Ahmad'));

        return redirect()->route('contact.create')->with('success' , "Your message has been sent .");
    }
}
