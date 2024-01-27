@extends('layouts.layouts')
@section('title-app', 'Shorts')

@section('content')
	
	<section class="col-md-6 mx-auto mt-5">
		
		<section class="card">
			<div class="card-header">
				<h2 class="card-title"> Form Sign In </h2>
			</div>
			<div class="card-body">
				
				<form action="{{ route('auth.login') }}" method="POST">
					@csrf

					<div class="mb-3 mx-auto">
						<label for="email"> Email: </label>
						<input type="email" id="email" class="form-control" name="email" placeholder="email">
						@error("email")
						  <span class="text-danger"> {{ $message }} </span>
						@enderror
					</div>

                    <div class="mb-3 mx-auto">
						<label for="password"> Password: </label>
						<input type="password" id="password" class="form-control" name="password" placeholder="Password">
						@error("email")
						  <span class="text-danger"> {{ $message }} </span>
						@enderror
					</div>


					<div class="mb-3 col-md-2 d-flex justify-content-center align-items-end">
						<input type="submit" class="btn btn-primary " value="Save">
					</div>
				</form>

			</div>
		</section>

	</section>

@endsection