<?php

namespace App\Listeners;

use App\Events\BotRunEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class BotRunEventListener
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
    * @param  Event  $event
    * @return void
    */
    public function handle(BotRunEvent $event)
    {
        $discord = new \Discord\Discord([
            'token' => $event->bot->token,
        ]);

        $discord->on('ready', function ($discord) use($event){
            $discord->on('message', function ($message) use($event){
                foreach ($event->message as $value) {
                    if ($value->message == $message->content) {
                        $message->reply($value->comment);
                    }
                }
            });
        });
        $discord->run();
    }
}
