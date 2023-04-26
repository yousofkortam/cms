@extends('layouts.app')
@section('content')
    <div class="jumbotron text-center" style="padding: 100px;">
        <h1 class="display-4" style="font-size: 3.5rem;">Welcome to Home</h1>
        <p class="lead">Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p>
        @if (!Auth::user())
            <a href="/login" class="btn btn-success">Login</a>
            <a href="/register" class="btn btn-primary">Register</a>
        @endif
    </div>
@endsection
