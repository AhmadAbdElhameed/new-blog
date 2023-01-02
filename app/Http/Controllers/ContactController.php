<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use App\Mail\Test;
use App\Mail\ContactMail;
use App\Models\Contact;
class ContactController extends Controller
{
    //
    public function create(){
        return view('contact');
    }
    public function store(){

        $data = array();
        $data['errors'] = [];
        $data['success'] = 0;
        $rules = [
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email' => 'required',
            'subject' => 'nullable|min:5|max:50',
            'message' => 'required|min:5|max:300',
        ];

        $validated = Validator::make(request()->all(),$rules);

        if($validated -> fails()){
            $data['errors']["first_name"] = $validated->errors()->first('first_name');
            $data['errors']["last_name"] = $validated->errors()->first('last_name');
            $data['errors']["email"] = $validated->errors()->first('email');
            $data['errors']["subject"] = $validated->errors()->first('subject');
            $data['errors']["message"] = $validated->errors()->first('message');

        }else{

            $attributes = $validated->validated();
            Contact::create($attributes);
                    // adding out email in ".env' file as "ADMIN_EMAIL"
        Mail::to(env('ADMIN_EMAIL'))->send(new ContactMail(
            $attributes['first_name'],
            $attributes['last_name'],
            $attributes['email'],
            $attributes['subject'],
            $attributes['message'],

        ));
        $data['success'] = 1;
        $data['message'] = 'Thank you for contacting with us';

        }
        //return redirect()->route('contact.create')->with('success' , "Your message has been sent .");

        return response()->json($data);
    }
}
