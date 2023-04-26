@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Posts Dashboard') }}</div>

                <div class="card-body">
                    <a class="btn btn-primary btn-s" href="/posts/create">Create post</a>
                    <h5 style="margin:20px 0;">Your Posts</h5>
                    <hr>
                    {{-- Posts here --}}
                    @if (count($posts) > 0)
                    <table class="table table-borderless">
                        <thead>
                          <tr>
                            <th scope="col">Title</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td></td>
                                    <td  class="d-flex" style="float: right">
                                        <a href="/posts/{{$post->id}}/edit" class="btn btn-sm btn-info" style="margin-right:10px">Edit</a>
                                        <a href="/posts/{{$post->id}}" class="btn btn-sm btn-success" style="margin-right:10px">Show</a>
                                        {!! Form::open(['action' => ['App\Http\Controllers\postsController@destroy', $post->id], 'method' => 'post', 'onclick' => 'return confirm("Are you sure to delete this post?")']) !!}

                                        <div class="form-group">
                                            {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger float-right'])}}
                                        </div>

                                        {{ Form::hidden('_method', 'DELETE') }}

                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <h4>No posts avaliable</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Media Dashboard') }}</div>

                <div class="card-body">
                    <a class="btn btn-primary btn-s" href="/media/upload">Create Meida</a>
                    <h5 style="margin:20px 0;">Your Media</h5>
                    <hr>
                    {{-- Media here --}}
                    @if (count($posts) > 0)
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th scope="col">Photo</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($media as $photo)
                                    <tr>
                                        <td>
                                            <img
                                                src="/photos/{{$photo->name}}"
                                                class="img-thumbnail"
                                                style="height: 60px; width: 60px;"
                                            >
                                        </td>

                                        <td class="d-flex" style="float: right">
                                            <a href="/media/{{$photo->id}}" class="btn btn-success btn-sm" style="margin-right:10px">Show</a>
                                            {!! Form::open(['action' => ['App\Http\Controllers\mediaController@destroy', $photo->id], 'method' => 'post', 'onclick' => 'return confirm("Are you sure to delete this photo?")']) !!}

                                            <div class="form-group">
                                                {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm float-right'])}}
                                            </div>

                                            {{ Form::hidden('_method', 'DELETE') }}

                                            {!! Form::close() !!}
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h4>No photos avaliable</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
