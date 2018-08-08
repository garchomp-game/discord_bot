@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                {{Form::open(['route' => ['message.store', $bot->id], 'class' => 'form-group', 'style' => 'width:80%; margin:30px auto;'])}}
                <textarea name="comment" class="form-control" placeholder="メッセージ文" style="margin-bottom:15px;">{{request('comment')}}</textarea>
                <message-create-content></message-create-content>
                <input type="submit" name="submit" value="登録" class="form-control btn-success" style="margin-top:15px;">
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
