<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class MailController extends Controller
{
    public function showForm()
    {
        return view('managerEmail');
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'title' => 'required|max:80',
            'text' => 'required',
        ]);

        $email = $request->input('email');
        $title = $request->input('title');
        $text = $request->input('text');

        Mail::to($email)->send(new SendMail($title, $text));

        return redirect()->route('mail.show')->with('success', 'メールが送信されました。');
    }
}

