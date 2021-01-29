<!-- laravel blade directives - starts with @  -->


@extends('layouts.app')


@section('content')

	<div class="flex justify-center">
		<div class="w-9/12 bg-white p-6 rounded-lg">
			@if(session('status'))
				<div class="bg-green-500 rounded-lg text-white text-center font-bold p-5 mb-5">
					{{ session('status') }}					
				</div>
			@endif
			@if(session('likestatus'))
				<div class="bg-green-500 rounded-lg text-white text-center font-bold p-5 mb-5">
					{{ session('likestatus') }}					
				</div>
			@endif
			@if(session('unlikestatus'))
				<div class="bg-yellow-500 rounded-lg text-black text-center font-bold p-5 mb-5">
					{{ session('unlikestatus') }}					
				</div>
			@endif
			@if(session('deletestatus'))
				<div class="bg-red-800 rounded-lg text-white text-center font-bold p-5 mb-5">
					{{ session('deletestatus') }}					
				</div>
			@endif
			@if(session('mailstatus'))
				<div class="bg-blue-800 rounded-lg text-white text-center font-bold p-5 mb-5">
					{{ session('mailstatus') }}					
				</div>
			@endif
			<div class="p-5 rounded-lg bg-black mt-0 mb-5 text-center">
				<h2 class="text-3xl font-bold leading-normal text-white">POSTS PAGE</h2>				
			</div>

			<form action="{{ route('posts') }}" method="POST" class="mb-5">
				@csrf

				<div class="mb-4">
					<label for="body" class="sr-only">Message</label>
					<textarea name="body" id="body" cols="30" rows="4" placeholder="Post Something !!" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"></textarea>

					@error('body')
						<div class="text-red-500 mt-2 text-sm">
							{{ $message }}
						</div>
					@enderror
				</div>
				<div>
					<button type="submit" class="bg-blue-500 text-white hover:text-red-500 px-4 py-3 rounded font-medium"><i class="fas fa-paper-plane"></i> Post</button>
				</div>
			</form>

	<!-- Show Posts with Like & Unlike features -->
		@if($posts->count())
			<div class="w-full">
				@foreach($posts as $post)
					
					<x-post :post="$post" />

				@endforeach
			</div>
		@else
			<div class="bg-gray-100 rounded-lg text-black text-center font-bold p-5 mb-5">
				No Posts Found
			</div>
		@endif

	<!-- Pagination Links -->
		{{ $posts->links() }}

		</div>
	</div>

@endsection