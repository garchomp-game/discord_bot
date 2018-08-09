<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Bot;
use App\Events\BotRunEvent;
use App\Jobs\BotRunQueue;

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

    public function on(Request $request, Bot $bot)
    {
        $message = Message::where('bot_id', $bot->id)->get();
        BotRunQueue::dispatch($bot, $message);
        return redirect()->route('root_path');
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
