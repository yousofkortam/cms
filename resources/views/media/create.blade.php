@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
@endsection

@section('content')
    <h1>Create Media</h1>

    <div class="row">
        <div class="col-md-8">
            {!! Form::open([
                'method' => 'post',
                'files' => true,
                'class' => 'dropzone',
                'action' => 'App\Http\Controllers\mediaController@store'
            ]) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
@endsection
