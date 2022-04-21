<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendRegisteredEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param $data
     *
     * @return void
     */
    public function handle($data)
    {
        $mail = Mail::to('karam2mustafa@gmail.com');
        return  $mail->send(new \App\Mail\SendRegisteredEmail($data->data));
    }
}
