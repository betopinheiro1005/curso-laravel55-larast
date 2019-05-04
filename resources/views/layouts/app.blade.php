<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/css/app.css">
</head>
<body>

    <div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="/">{{ config('app.name') }}</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
			@if(Auth::check())
			    <ul class="navbar-nav">
			      <li class="nav-item dropdown {{ Request::is('notes') ? 'active' : '' }}">
			      	<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
	        		Anotações
	      			</a>
	      			<div class="dropdown-menu">
	        			<a class="dropdown-item" href="/notes">Ver</a>
	        			<a class="dropdown-item" href="/notes/create">Criar</a>
	      			</div>
				  </li>
				  <li class="dropdown">
			       	  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
	        		  Últimas Anotações
	      			  </a>
	      			  <ul class="dropdown-menu">
						  @foreach ($lastNotes as $note)
							  <li class="list-group-item"><a href="/notes/{{ $note->id }}">{{ $note->title }}</a></li>
						  @endforeach
	      			  </ul>
				  </li>

			      <li class={{ Request::is('contact') ? 'active' : ''}}>
			        <a class="nav-link" href="/contact">Contato</a>
			      </li>
			    </ul>
			@endif

		    <!-- Right Side Of Navbar -->
		    <ul class="navbar-nav ml-auto">
		        <!-- Authentication Links -->
		        @guest
		            <li class="nav-item">
		                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
		            </li>
		            <li class="nav-item">
		                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
		            </li>
		        @else
		            <li class="nav-item dropdown">
		                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
		                    {{ Auth::user()->name }} <span class="caret"></span>
		                </a>

		                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
		                    <a class="dropdown-item" href="{{ route('logout') }}"
		                       onclick="event.preventDefault();
		                                     document.getElementById('logout-form').submit();">
		                        {{ __('Logout') }}
		                    </a>

		                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		                        @csrf
		                    </form>
		                </div>
		            </li>
		        @endguest
		    </ul>

		  </div>
		</nav>
	</div>

	<div class="container">
{{-- 		<ul>
			<li>{{ Auth::user() -> name }}</li>
			<li>{{ Auth::user() -> email }}</li>
		</ul>
 --}}		@yield('content')
	</div>

	<footer>
		<div class="container">
			{{ config('app.name') }} . Todos os direitos reservados
		</div>
	</footer>

    <script src="/js/app.js"></script>

	@yield('scripts')

</body>
</html>