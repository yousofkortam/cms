@extends('layouts.app')
@section('content')
    <div class="m-5">
        <h1 class="text-center">Create Post</h1>

    {!! Form::open(['action' => 'App\Http\Controllers\postsController@store', 'method' => 'post', 'files' => true]) !!}

        <div class="form-group" style="margin-top:20px;">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', '', [ 'class' => 'form-control' ])  }}
        </div>

        <div class="form-group" style="margin-top:20px;">
            {{ Form::label('body', 'Body') }}
            {{ Form::textarea('body', '', [ 'class' => 'form-control' , 'rows' => '5', 'id' => 'body_id' ])  }}
        </div>

        <div class="form-group" style="margin-top:20px;">
            {{Form::file('cover_image')}}
        </div>

        <div class="form-group" style="margin-top:20px;">
            {{ Form::submit('Submit', [ 'class' => 'btn btn-primary' ])  }}
        </div>

    {!! Form::close() !!}
    </div>
@endsection
