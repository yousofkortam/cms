@extends('layouts.app')
@section('content')
    <div class="card m-2">
        <div class="card-body">
            <div class="card-title">
                <h2 style="padding: 10px 0;">{{$post->title}}</h2>
                <img style="width: 100%; max-height: 400px;" src="/covers/{{$post->cover_image}}" alt="{{$post->cover_image}}">
                <p style="padding: 10px 0; font-size: 30px;">{!!$post->body!!}</p>
                <hr>
                <small>Created at: {{$post->created_at}} by <strong>{{$post->user->name}}</strong> </small>
            </div>
            @if (Auth::user() && Auth::user()->id == $post->user->id)
                <hr>
                <div class="d-flex">
                    <a href="/posts/{{$post->id}}/edit" class="btn btn-info" style="margin-right:10px;">Edit</a>
                    <div>
                        {!! Form::open(['action' => ['App\Http\Controllers\postsController@destroy', $post->id], 'method' => 'post']) !!}

                        <div class="form-group">
                            {{Form::submit('Delete', ['class' => 'btn btn-danger float-right', 'onclick' => 'return confirm("Are you sure to delete this post?")'])}}
                        </div>

                        {{ Form::hidden('_method', 'DELETE') }}

                        {!! Form::close() !!}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
