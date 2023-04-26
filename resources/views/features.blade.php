@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <ul class="list-group">
        @foreach($feat as $f)
            <li class="list-group-item" aria-current="true">{{$f}}</li>
        @endforeach
    </ul>
@endsection
