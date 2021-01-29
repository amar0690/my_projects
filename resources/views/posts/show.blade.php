@extends('layouts.app')


@section('content')

	<div class="flex justify-center">
		<div class="w-8/12 bg-white p-6 rounded-lg">
			
			<div class="p-5 rounded-lg bg-black mt-0 mb-5 text-center">
				<h2 class="text-3xl font-bold leading-normal text-white">SINGLE POST PAGE</h2>			
			</div>

			<x-post :post="$post" />
		</div>
	</div>

@endsection