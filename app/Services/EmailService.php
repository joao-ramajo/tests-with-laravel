<?php

namespace App\Services;

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function sendWelcome(string $email): void
    {
        Mail::to($email)->send(new WelcomeMail());
    }
}
