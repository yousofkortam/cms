@extends('layouts.app')
@section('content')
    <h1>Media</h1>

    <a href="/media/upload" class="btn btn-primary">Upload</a>
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

    @if(count($media) > 0)
        <div class="row">
            @foreach($media as $photo)
                <div class="col-md-4 col-sm-6">
                    <a href="/media/{{$photo->id}}">
                        <img src="/photos/{{$photo->name}}" class="img-thumbnail" style="width:100%;height:100%">
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <h2>No Photos Available</h2>
    @endif
@endsection
