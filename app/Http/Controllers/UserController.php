<?php

namespace App\Http\Controllers;

use App\Services\MailService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private MailService $mailService;

    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }

   public function sendMail(Request $request)
   {
       return $this->mailService->sendMail($request);
   }

   public function sendTelegram(Request $request)
   {
       return $this->mailService->sendTelegramBot($request);
   }
}
