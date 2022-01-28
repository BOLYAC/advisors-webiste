<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class ContactUsFormController extends Controller
{
    // Create Contact Form
    public function createForm(Request $request)
    {
        return view('contact');
    }

    // Store Contact Form data
    public function ContactUsForm(Request $request)
    {
        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);

        $request_data = $request->except('_token');
        $request_data['subject'] = $request->header('User-Agent');
        // Send form to the CRM
        $response = Http::asForm()->post('http://advisors.local/web-hook/wbInquiries', $request_data);

        //  Store data in database
        Contact::create($request_data);

        // return view with message
        return redirect()->route('thankyou');
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
