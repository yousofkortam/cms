@extends('layouts.app')


@section('content')
<section class="h-100 gradient-custom-2">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-9 col-xl-7">
          <div class="card">
            <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
              <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                <img src="/profile/OIP.jpeg"
                  alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                  style="width: 150px; z-index: 1">
                @if (Auth()->user()->id == $user->id)
                  <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                  style="z-index: 1;">
                  Edit profile
                  </button>
                @endif
              </div>
              <div class="ms-3" style="margin-top: 130px;">
                <h5>{{$user->name}}</h5>
                <p>{{$user->email}}</p>
              </div>
            </div>
            <div class="p-4 text-black" style="background-color: #f8f9fa;">
              <div class="d-flex justify-content-end text-center py-1">
                <div>
                  <p class="mb-1 h5">{{count($user->media)}}</p>
                  <p class="small text-muted mb-0">Photos</p>
                </div>
                <div class="px-3">
                  <p class="mb-1 h5">{{count($user->posts)}}</p>
                  <p class="small text-muted mb-0">Posts</p>
                </div>
              </div>
              <div class="mb-5">
                <p class="lead fw-normal mb-1">About</p>
                <div class="p-4" style="background-color: #f8f9fa;">
                </div>
              </div>
            </div>
            <div class="card-body p-4 text-black">
              
              @if(count($user->posts) > 0)
                @foreach($user->posts as $post)
                  <div class="card mt-3">
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
                @endforeach
              @else
                  <h2 style="text-align: center">No posts Available</h2>
              @endif
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection