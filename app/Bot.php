<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use RestCord\DiscordClient;

class Bot extends Model
{
    protected $fillable = [
        'token', 'guild_id', 'user_id'
    ];

    public static function guilds()
    {
        $server = self::all();
        $guild_list = [];
        if ($server->isNotEmpty()) {
            foreach ($server as $value) {
                $client = new DiscordClient(['token' => $value->token]);
                $guild = $client->guild->getGuild(['guild.id' => $value->guild_id]);
                $guild->username = $client->user->getCurrentUser()->username;
                $guild->bot_table_id = $value->id;
                array_push($guild_list, $guild);
                // dd($guild);
            }
        }
        return $guild_list;
    }

    /**
     * ギルドリストから一見取得
     *
     * @param int $id botのid
     * @return object $guild 拾ってきたギルドの単体
     */
    public static function guild($bot)
    {
        $client = new DiscordClient(['token' => $bot->token]);
        $guild = $client->guild->getGuild(['guild.id' => $bot->guild_id]);
        $guild->username = $client->user->getCurrentUser()->username;
        $guild->bot_id = $bot->id;
        return $guild;
    }
}
