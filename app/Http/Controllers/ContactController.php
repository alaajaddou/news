<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactConfirmation;
use App\Mail\ContactNotification;

class ContactController extends Controller
{
    /**
     * Display the contact form.
     */
    public function index()
    {
        return view('contact.index');
    }

    /**
     * Handle the contact form submission.
     */
	public function submit(Request $request)
	{
		$validated = $request->validate([
			'g-recaptcha-response' => 'required',
			'name'    => 'required|string|max:255',
			'email'   => 'required|email|max:255',
			'message' => 'required|string'
		]);

		$response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
			'secret'   => config('captcha.secret_key'),
			'response' => $request->input('g-recaptcha-response'),
			'remoteip' => $request->ip(),
		]);

		if (!($response->json()['success'] ?? false)) {
			return back()->withErrors(['g-recaptcha-response' => 'reCAPTCHA verification failed. Please try again.'])->withInput();
		}

		$contact = Contact::create([
			'name'    => $validated['name'],
			'email'   => $validated['email'],
			'message' => $validated['message']
		]);

		// Send confirmation email to sender
		Mail::to($contact->email)
			->send(new ContactConfirmation($contact));

		// Send notification to company
		Mail::to('info@aj-group.ps')
			->send(new ContactNotification($contact));

		return redirect()->route('contact.index')->with('success', 'Thank you for your message. We will contact you soon!');
	}
}
