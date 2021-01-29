@extends('layouts.app')


@section('content')

	<div class="flex justify-center">

		<div class="w-6/12 bg-white p-6 rounded-lg mb-20">
			<div class="p-5 rounded-lg bg-black mt-0 mb-5 text-center">
				<h2 class="text-3xl font-bold leading-normal text-white">LOGIN PAGE</h2>
			</div>

		@if(session('status'))
			<div class="bg-red-500 rounded-lg text-white text-center p-5 mb-5">
				{{ session('status') }}					
			</div>
		@endif

			<form action="{{ route('login') }}" method="POST">
				@csrf

				<div class="mb-4">
					<label for="email" class="sr-only">Email</label>
					<input type="email" name="email" value="{{ old('email') }}" id="email" placeholder="Your Email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror">

					@error('email')
						<div class="text-red-500 mt-2 text-sm">
							{{ $message }}
						</div>
					@enderror
				</div>
				<div class="mb-4">
					<label for="password" class="sr-only">Password</label>
					<input type="password" name="password" value="{{ old('password') }}" id="password" placeholder="Your Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror">

					@error('password')
						<div class="text-red-500 mt-2 text-sm">
							{{ $message }}
						</div>
					@enderror
				</div>
				<div class="mb-4">
					<div class="flex items-center">
						<input type="checkbox" name="remember" id="remember" class="mr-2">
						<label for="remember">Remember me</label>
					</div>
				</div>
				<div>
					<button type="submit" class="bg-blue-500 text-white hover:text-red-500 px-4 py-3 rounded font-medium w-full">Login</button>
				</div>
			</form>
		</div>
	</div>

@endsection