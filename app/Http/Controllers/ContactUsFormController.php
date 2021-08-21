<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsFormController extends Controller
{
    // Create Contact Form
    public function createForm(Request $request)
    {
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
        ]);

        $request_data = $request->except('_token');
        $request_data['subject'] = $request->header('User-Agent');
        //  Store data in database
        Contact::create($request_data);

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
