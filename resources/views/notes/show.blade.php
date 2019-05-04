@extends('layouts.app')

@section('title')
   	Anotação: {{ $note->title }}
@endsection

@section('content')
	<h1>{{ $note->title }}</h1>
	<pre>{{ $note->body }}</pre>
@endsection

