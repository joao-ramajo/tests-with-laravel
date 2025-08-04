<?php

use App\Mail\WelcomeMail;
use App\Services\EmailService;
use Illuminate\Support\Facades\Mail;

beforeEach(function() {
    Mail::fake();
    $this->service = new EmailService();
});

test('Envia o email com sucesso', function() {
    $this->service->sendWelcome('joao-ramajo@gmail.com');

    Mail::assertSent(WelcomeMail::class, function($mail){
        return $mail->hasTo('joao-ramajo@gmail.com');
    });
});