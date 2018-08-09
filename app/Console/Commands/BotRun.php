<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Bot;
use Discord\Discord;
use Discord\Cache\Cache;
use Discord\Parts\Channel\Channel;
use Discord\Parts\Channel\Message;
use Discord\Parts\Part;
use Discord\Parts\User\Game;
use Discord\Parts\User\User;
use React\Promise\Deferred;
use App\Aggregate;

class BotRun extends Command
{
    protected $signature = 'bot:run';
    protected $description = 'Command description';
    private $bot;
    public function __construct()
    {
        parent::__construct();
        $this->bot = Bot::find(2);
    }
    public function handle()
    {
        $discord = new Discord([
            'token' => $this->bot->token, // ←作成したBotのTokenを入力してね
        ]);
        $discord->on('ready', function ($discord) {
            echo "Bot is ready.";
            // Listen for events here
            $discord->on('message', function ($message) use($discord){
                $user_id = $message->author->user->id;
                $user_name = $message->author->user->name;
                $comment = $message->content;
                Aggregate::create([
                    'user_id' => $user_id,
                    'user_name' => $user_name,
                    'comment' => $comment,
                ]);
            });
        });
        $discord->run();
    }
}
/*
user_id
user_name
comment
*/
