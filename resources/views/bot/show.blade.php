@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <h2 class="text-center">{{$guild->name}}</h2>
                <ul class="list-group" style="width:80%; margin:15px auto;">
                    <h3>登録しているリストグループ</h3>
                    <a href="{{route('message.create', $guild->bot_id)}}" class="btn btn-success" style="margin-bottom:15px;">新しくメッセージを作る</a>
                    @foreach ($messages as $value)
                        <li class="list-group-item row">
                            <div class="col-md-10">
                                <p>{{$value->comment}}</p>
                                <p>{{checkTypeChange($value->check_type)}}</p>
                                @if ($value->check_type == 'message')
                                    <p>{{$value->message}}</p>
                                @elseif($value->time)
                                    <p>{{$value->time}}</p>
                                @endif
                                <p></p>
                            </div>
                            <div class="col-md-2 text-right">
                                <a href="javascript:bot_run.submit()"
                                class="btn btn-warning"
                                style="margin-bottom:15px;">編集</a><br>
                                {{Form::open(['route' => ['message.on', $value->bot_id]])}}
                                {{Form::close()}}
                                <a href="javascript:destroy.submit()"
                                class="btn btn-danger">削除</a>
                                {{Form::open(['route' => ['message.destroy', $value->bot_id, $value->id], 'method' => 'delete'])}}
                                {{Form::close()}}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
