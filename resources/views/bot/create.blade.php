@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                {{Form::open(['route' => 'bot.store', 'class' => 'form-group', 'style' => 'width:70%; margin:30px auto;'])}}
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <h2>ボット新規作成</h2>
                <a href="https://discordapp.com/developers/applications/" class="text-center form-control btn-success" target="_blank">ぼっと作成画面はこちら（公式サイトに飛びます）</a>
                <p>ボットのトークン(BotからCopyボタンでクリップボードにコピー可能)</p>
                <input class="form-control" type="password" name="token" value="{{request('token')}}" placeholder="トークン">
                <p>サーバーID(サーバー設定からウィジェットで確認可能)</p>
                <input class="form-control" type="text" name="guild_id" value="{{request('guild_id')}}" placeholder="ギルドID">
                <input type="submit" name="submit" value="登録">
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
