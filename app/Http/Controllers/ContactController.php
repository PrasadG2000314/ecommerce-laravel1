<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Save to the database
        Contact::create($validated);

        // Send email notification (optional)
        Mail::send('emails.contact', $validated, function ($mail) use ($validated) {
            $mail->to('admin@3dstore.com')
                 ->subject('New Contact Message: ' . $validated['subject']);
        });

        return response()->json(['message' => 'Your message has been sent successfully!'], 200);
    }
}
