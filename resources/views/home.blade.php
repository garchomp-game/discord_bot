@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">ダッシュボード</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h2>ボット一覧</h2>
                        <ul class="list-group">
                            @forelse ($guilds as $value)
                                <a class="list-group-item" href="{{route('bot.show', $value->bot_table_id)}}">
                                    <h2>{{$value->name}}</h2>
                                    <p>{{$value->username}}</p>
                                </a>
                            @empty
                                <li class="list-group-item">まだボットは登録されていません</li>
                            @endforelse
                            <a href="{{route('bot.create')}}" class="btn btn-success" style="margin-top:15px;">ボットを追加する</a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
