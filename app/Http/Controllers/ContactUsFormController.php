<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactUsFormController extends Controller
{
    // Create Contact Form
    public function createForm(Request $request) {
        return view('contact');
    }

    // Store Contact Form data
    public function ContactUsForm(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'message' => 'required'
        ]);

        $request_data = $request->except('_token');
        //  Store data in database
        Contact::create($request_data);

        //  Send mail to admin
        \Mail::send('site.mails.contact-form', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'user_query' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to(config('settings.default_email_address'), 'Admin')->subject('Email from contact form.');
        });

        //
        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }

    public function newsletterSubscribe(Request $request)
    {
      // Form validation
      $this->validate($request, [
        'email' => 'required|email',
      ]);
      Contact::create([
        'email' => $request->email
      ]);
      return view('site.success');
    }
}
