@extends('layouts.app')

@section('title')
   	Editar: {{ $note->title }}
@endsection

@section('content')
	{{-- <form action="/notes/{{ $note->id }}" method="POST" role="form"> --}}
	{!! Form::model($note, ['url' => "/notes/{$note->id}", "method" => "PATCH"]) !!}
		{{-- {{ method_field('PATCH') }}
		{{ csrf_field() }} --}}
		<legend>Editar anotação</legend>
		@include('partials.errors')
		@include('notes._form')
		<button type="submit" class="btn btn-primary">Editar</button>
	{!! Form::close() !!}
	{{-- </form> --}}
@endsection

