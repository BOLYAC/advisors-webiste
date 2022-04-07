<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Stevebauman\Location\Facades\Location;

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
            'full_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
        ]);

        $ip = $request->ip();
        $data = Location::get($ip);


        $request_data = $request->except('_token');
        $request_data['country'] = $data->countryName;
        $request_data['city'] = $data->cityName;
        dd($request_data);
        $request_data['subject'] = $request->header('User-Agent');

        // Send form to the CRM
        $response = Http::asForm()->post('http://advisors.local/web-hook/wbInquiries', $request_data);

        //  Store data in database
        Contact::create($request_data);

        // return view with message
        return redirect()->route('ContactThankYou')->with('message', __('Your message has been sent successfully, we will get in touch with you as soon as possible'));
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
        return redirect()->route('newsletterThankYou')->with('message', __('Thank you for joining our newsletters!'));
    }
}
