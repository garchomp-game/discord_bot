@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                {{Forn::open(['route' => 'message.store', 'class' => 'form-group'])}}
                <textarea name="comment" class="form-control">{{request('comment')}}</textarea>
                <input type="radio" name="check_type" value="">
                <input type="radio" name="check_type" value="">7
                
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
