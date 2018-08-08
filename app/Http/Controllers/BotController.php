<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Bot;

class BotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function on(Request $request)
    {
        $bot = Bot::find($request->bot_id);
        $message = Message::where('bot_id', $request->bot_id)->get();
        event(new BotRunEvent($bot, $message));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bot.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Bot::create($request->all());
        return redirect()->route('root_path');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bot $bot)
    {
        if ($bot->user_id != auth()->user()->id) {
            return redirect()->route('root_path');
        }
        $guild = Bot::guild($bot);
        $messages = Message::where('bot_id', $bot->id)->get();
        return view('bot.show', compact('guild', 'messages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
