<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bot;
use RestCord\DiscordClient;

class HomeController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $server = Bot::all();
        $guild_list = [];
        if ($server->isNotEmpty()) {
            foreach ($server as $value) {
                $client = new DiscordClient(['token' => $value->token]);
                $guild = $client->guild->getGuild(['guild.id' => $value->guild_id]);
                $guild->username = $client->user->getCurrentUser()->username;
                array_push($guild_list, $guild);
                // dd($guild);
            }
        }
        return view('home', compact('guild_list'));
    }
}
