@extends('layouts.app')

@section('title')
   	Criar uma nova anotação
@endsection

@section('content')
	{{-- <form action="/notes" method="POST" role="form"> --}}
	{!! Form::open(['url' => "/notes", "method" => "POST"]) !!}
		{{-- {{ csrf_field() }} --}}
		<legend>Criar nova anotação</legend>
		@include('partials.errors')
		@include('notes._form')
		<button type="submit" class="btn btn-primary">Criar</button>
	{!! Form::close() !!}
	{{-- </form> --}}
@endsection

