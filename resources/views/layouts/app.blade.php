<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
   	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equip="X-UA-Compatible" content="ie=edge">
	<title>Posty</title>
   	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-200">

	<nav class="p-6 bg-white flex justify-between mb-6">
		<ul class="flex item-center">
			<li class="mt-2 mr-2">
				<a href="{{ route('home') }}" class="text-blue-700 bg-transparent hover:bg-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-700 hover:border-transparent rounded p-3 mt-2"><i class="fas fa-home"></i> Home</a>
			</li>
			<li class="mt-2">
				<a href="{{ route('posts') }}" class="text-green-700 bg-transparent hover:bg-green-700 font-semibold hover:text-white py-2 px-4 border border-green-700 hover:border-transparent rounded p-3 mt-2"><i class="fas fa-pen-square"></i> Posts</a>
			</li>
		</ul>

		<ul class="flex item-center">
		
		<!-- //Another blade directive for printing authenticated user data
		@auth
		@endauth
		@guest
		@endguest -->

		@if(auth()->user())
			<li class="mt-2 mr-2">
				<a href="{{ route('dashboard') }}" class="p-3">Hi, <i class="fas fa-user"></i> {{ auth()->user()->username }}</a>
			</li>
			<li class="mt-2 mr-2">
				<a href="{{ route('dashboard') }}" class="text-black bg-transparent hover:bg-black font-semibold hover:text-white py-2 px-4 border border-black hover:border-transparent rounded p-3"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
			</li>
			<li>
				<form action="{{ route('logout') }}" method="POST" class="inline">
					@csrf
					<button type="submit" class="text-red-500 bg-transparent hover:bg-red-500 font-semibold hover:text-white py-2 px-3 border border-red-500 hover:border-transparent rounded"><i class="fas fa-sign-out-alt"></i> Logout</button>
				</form>
				
			</li>
		@else
			<li class="mt-2">
				<a href="{{ route('register') }}" class="text-purple-500 bg-transparent hover:bg-purple-500 font-semibold hover:text-white py-2 px-3 border border-purple-500 hover:border-transparent rounded mr-5"><i class="fas fa-id-badge"></i> Register</a>
			</li>
			<li class="mt-2">
				<a href="{{ route('login') }}" class="text-green-500 bg-transparent hover:bg-green-500 font-semibold hover:text-white py-2 px-3 border border-green-500 hover:border-transparent rounded"><i class="fas fa-sign-in-alt"></i> Login</a>
			</li>
		@endif
		</ul>
	</nav>

	@yield('content')
{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> --}}
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>
</html>