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

    public function sendTelegramBot(Request $request)
    {
        $token = "7213771290:AAGdBOXPd2KhO8Gv1WDRVfTeRcSOzpVTZfs";
        $chat_id = 648329927;

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');

        $res = "*Имя:* ".$name."\n*Email:* ".$email."\n*Телефон:* ".$phone;

        $option = [
            "chat_id" => $chat_id,
            "text" => $res,
            "parse_mode" => "Markdown"
        ];

        $url = "https://api.telegram.org/bot" . $token . "/sendMessage?" . http_build_query($option);

        file_get_contents($url);

        return response()->json(['message' => 'Message sended'],200);
    }
}
