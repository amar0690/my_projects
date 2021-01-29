@props(['post'=> $post])

<div class="relative bg-gray-100 p-2 mb-4">
	<a href="{{ route( 'users.posts', $post->user ) }}" class="font-bold">{{ $post->user->name }}</a> 
	<span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>

	<p>{{ $post->body }}</p>

	

	<span class="font-bold">{{ $post->likes->count() }} {{ Str::plural( 'like', $post->likes->count() ) }}</span>

	<div class="absolute top-2 right-5 flex items-center">

	<!-- Enabling like/unlike functionality to signed-in user only -->
		@auth
			@if(!$post->likedBy(auth()->user()))
				<form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-2">
					@csrf
					<button type="submit" class="text-green-700 bg-transparent hover:bg-green-700 font-semibold hover:text-white py-2 px-4 border border-green-700 hover:border-transparent rounded"><i class="fas fa-thumbs-up"></i></button>
				</form>
			@else
				<form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-2">
					@csrf
					@method('DELETE')
					<button type="submit" class="text-red-500 bg-transparent hover:bg-red-500 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"><i class="fas fa-thumbs-down"></i></button>
				</form>
			@endif
		@endauth

		<a href="{{ route( 'posts.show', $post ) }}" class="text-sm text-green-700 bg-transparent hover:bg-green-700 font-semibold hover:text-white p-2 m-4 border border-green-700 hover:border-transparent rounded"><i class="fas fa-eye"></i> View Post</a>
		
	<!-- Enabling delete functionality for posts that are posted only by signed-in user-->
		@can('delete', $post)
			<form id="form{{ $post->id }}" action="{{ route('posts.delete', $post) }}" method="POST" class="mr-2">
				@csrf
				@method('DELETE')
				{{-- <button type="submit" class="text-white bg-black hover:bg-red-700 font-semibold hover:text-white py-2 px-4 border border-black-700 hover:border-transparent rounded">Delete</button> --}}

			{{-- sweetalert not working properly --}}
				{{-- <button onclick="deleteConfirm('form{{ $post->id }}')" class="text-white bg-black hover:bg-red-700 font-semibold hover:text-white py-2 px-4 border border-black-700 hover:border-transparent rounded">Delete</button> --}}

				<button onclick="return confirm('Do you want to delete post?')" class="text-white bg-black hover:bg-red-700 font-semibold hover:text-white py-2 px-4 border border-black-700 hover:border-transparent rounded">Delete</button>
			</form>
		@endcan
		
	</div>						

</div>