@extends('layouts.app')


@section('content')

	<div class="flex justify-center">
		<div class="w-8/12">
			<h2 class="text-2xl text-center p-5 rounded mb-5 w-full text-black">USER Page</h2>
			<div class="p-6">
				<h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>
				<p>Posted {{ $posts->count() }} {{ Str::plural( 'post', $posts->count() ) }} and received {{ $user->receivedLikes()->count() }} likes</p>
			</div>
			<div class="bg-white p-6 rounded-lg">
				@if($posts->count())
					<div class="w-full">
						@foreach($posts as $post)
							
							<x-post :post="$post" />

						@endforeach
					</div>
				@else
					<div class="bg-gray-100 rounded-lg text-black text-center font-bold p-5 mb-5">
						{{ $user->name }} does not have any posts.
					</div>
				@endif
			</div>
		</div>
	</div>

@endsection