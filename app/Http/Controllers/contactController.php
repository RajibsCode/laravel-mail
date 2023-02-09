<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\sendMail;
use Illuminate\Support\facades\Mail;

class contactController extends Controller
{
    //
    public function sendMail()
    {
        return view('contact');
    }

    public function send_mail_data(Request $request)
    {
        // 5. now code in post route method
        $name = $request->name;
        $subject = $request->subject;
        $email = $request->email;
        $message = $request->message;

        // 6. code for send mail
        $send_mail = "choltem99@gmail.com";// mail will sent here

        Mail::to($send_mail)->send(new sendMail($name, $subject, $email, $message));

        return redirect('/mail')->with('status', 'Email Sent Successfully');


    }

}
