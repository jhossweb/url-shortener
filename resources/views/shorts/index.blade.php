@extends('layouts.layouts')
@section('title-app', 'Shorts')

@section('content')
	
	@auth
		<section class="col-md-12 mx-auto mt-5">
			
			<section class="card">
				<div class="card-header">
					<h2 class="card-title"> Form Shortener </h2>
				</div>
				<div class="card-body">
					
					<form action="{{ route('short.store') }}" method="POST" class="row">
						
						@csrf
						<input type="hidden" name="user_id" value="{{ Auth::id() }}">
						
						<div class="mb-3 col-md-7">
							<label for="url"> Url: </label>
							<input type="url" id="url" class="form-control" name="long_url" placeholder="Url">
							@error("long_url")
							<span class="text-danger"> {{ $message }} </span>
							@enderror
						</div>

						<div class="mb-3 col-md-3">
							<label for="description"> Description: </label>
							<input type="text" id="description" class="form-control" name="description" placeholder="Description">
							@error("long_url")
							<span class="text-danger"> {{ $message }} </span>
							@enderror
						</div>


						<div class="mb-3 col-md-2 d-flex justify-content-center align-items-end">
							<input type="submit" class="btn btn-primary" value="Save">
						</div>
					</form>

				</div>
			</section>

		</section>

		<section class="mx-auto col-md-8 mt-5">
			<div class="row">
				<div class="card">
					<div class="card-header">
						<h3> Links </h3>
					</div>
					@foreach($links as $link)
						<ul class="list-group list-group-flush">
							<li class="d-flex justify-content-around align-items-center list-group-item text-center"> 
								<div class="p-3">
									Short Url: <strong> 
									<a href="{{ route('short.search', $link->short_url) }}" data-url="{{ $link->id }}"> 
										{{ $link->short_url }}
									</a> </strong> 
								</div>
								<div class="p-3">
									Description: <strong> {{ $link->description }}  </strong> 
								</div>
								<div class="p-3">
									<a href="" class="btn btn-primary" id="{{ $link->id }}">
										Clicks
										<span class="badge badge-light">{{ $link->click_count }}</span>
									</a>
								</div>
								<div class="p-3">
									<form action="{{ route('short.delete', $link) }}" method="POST">

										@csrf
										@method('delete')
										<button class="btn btn-danger" type="submit"> Delete </button>
									</form>
								</div>
							</li>
						</ul>
					@endforeach
				</div>
			</div>
		</section>
	@endauth

@endsection