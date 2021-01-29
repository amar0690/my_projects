@extends('layouts.app')


@section('content')

	<div class="flex justify-center">

		<div class="w-6/12 bg-white p-6 rounded-lg mb-20">
			
			<div class="p-5 rounded-lg bg-black mt-0 mb-5 text-center">
				<h2 class="text-3xl font-bold leading-normal text-white">REGISTER PAGE</h2>
			</div>

			<form action="{{ route('register') }}" method="POST">
				@csrf

				<div class="mb-4">
					<label for="name" class="sr-only">Name</label>
					<input type="text" name="name" value="{{ old('name') }}" id="name" placeholder="Your Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror">

					@error('name')
						<div class="text-red-500 mt-2 text-sm">
							{{ $message }}
						</div>
					@enderror
				</div>
				<div class="mb-4">
					<label for="username" class="sr-only">Username</label>
					<input type="text" name="username" value="{{ old('username') }}" id="username" placeholder="Your Username" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror">

					@error('username')
						<div class="text-red-500 mt-2 text-sm">
							{{ $message }}
						</div>
					@enderror
				</div>
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
					<label for="password_confirmation" class="sr-only">Repeat Password</label>
					<input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" id="password_confirmation" placeholder="Repeat Your Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password_confirmation') border-red-500 @enderror">

					@error('password_confirmation')
						<div class="text-red-500 mt-2 text-sm">
							{{ $message }}
						</div>
					@enderror
				</div>
				<div>
					<button type="submit" class="bg-blue-500 text-white hover:text-red-500 px-4 py-3 rounded font-medium w-full">Submit</button>
				</div>

			</form>
		</div>
	</div>

@endsection