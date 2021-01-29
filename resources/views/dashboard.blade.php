@extends('layouts.app')


@section('content')

	<div class="flex justify-center">
		<div class="w-8/12 bg-white p-6 rounded-lg">
			@if(session('status'))
				<div class="bg-green-500 rounded-lg text-white text-center font-bold p-5 mb-5">
					{{ session('status') }}					
				</div>
			@endif
			<div class="p-5 rounded-lg bg-black mt-0 mb-5 text-center">
				<h2 class="text-3xl font-bold leading-normal text-white">WELCOME TO DASHBOARD</h2>		
			</div>
		</div>
	</div>

@endsection