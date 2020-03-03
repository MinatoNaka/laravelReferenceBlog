<?php

namespace App\Listeners;

use App\Mail\UserRegistered;
use Illuminate\Auth\Events\Registered;

class SendUserRegisteredNotification
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
     * @param Registered $event
     * @return void
     */
    public function handle(Registered $event)
    {
        \Mail::to($event->user)->send(new UserRegistered($event->user));
    }
}
