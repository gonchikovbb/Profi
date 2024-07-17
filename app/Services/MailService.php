<?php

namespace App\Services;

use App\Mail\User\MessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function sendMail(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
//       $phone = $request->input('phone');

        Mail::to($email)->send(new MessageMail($name));

        return response()->json(['message' => 'Message sended'],200);
    }
}
