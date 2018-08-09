<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use RestCord\DiscordClient;

class BotRunQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $bot;
    private $message;
    /**
    * Create a new job instance.
    *
    * @return void
    */
    public function __construct($bot, $message)
    {
        $this->bot = $bot;
        $this->message = $message;
    }

    /**
    * Execute the job.
    *
    * @return void
    */
    public function handle()
    {

        $discord = new DiscordClient(['token' => $this->bot->token]); // Token is required
        $discord->{'audit-log'}->createMessage([
            'guild.id' => $this->bot->guild_id
        ]);
    }
}
