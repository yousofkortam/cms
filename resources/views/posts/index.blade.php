@extends('layouts.app')
@section('content')
    <div class="d-flex align-items-center justify-content-center">
        <h1 style="margin-right: 20px;">Posts</h1>

        <a href="/posts/create" class="btn btn-sm btn-primary">Create</a>
    </div>
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif

    @if (session('delete'))
    <div class="alert alert-danger" role="alert">
        {{ session('delete') }}
      </div>
    @endif

    @if(count($posts) > 0)
        @foreach($posts as $post)
        <div class="container mt-5 mb-5">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="d-flex justify-content-between p-2 px-3">
                            <div class="d-flex flex-row align-items-center"> <img src="/profile/OIP.jpeg" width="50" class="rounded-circle">
                                <div class="d-flex flex-column ml-2"> 
                                    <span class="font-weight-bold" style="margin-left: 5px;"> {{$post->user->name}} </span>
                                </div>
                            </div>
                            <div class="d-flex flex-row mt-1 ellipsis"> <small class="mr-2">{{$post->created_at}}</small> <i class="fa fa-ellipsis-h"></i> </div>
                        </div> 
                        <div style="margin-left:20px;">
                            <p class="text-justify"><strong>{{$post->title}}</strong> </p>
                        </div>
                        <a href="/posts/{{$post->id}}">
                            <img src="/covers/{{$post->cover_image}}" class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <h2>No posts Available</h2>
    @endif
@endsection