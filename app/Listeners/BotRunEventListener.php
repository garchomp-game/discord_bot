<?php

namespace App\Listeners;

use App\Events\BotRunEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use RestCord\DiscordClient;


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
        $discord = new DiscordClient(['token' => $event->bot->token]); // Token is required
        $discord->{'audit-log'}->getGuildAuditLog([
            'guild.id' => $event->bot->guild_id
        ]);
    }
}
