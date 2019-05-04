@extends('layouts.app')

@section('title')
    {{ config('app.name') }}
@endsection

@section('content')
	<h1>Bem-vindo às {{ config('app.name') }}</h1>
@endsection