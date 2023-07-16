@extends('layouts.simple.master')
@section('title', 'Edit Profile')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Edit Profile</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Users</li>
<li class="breadcrumb-item active">Edit Profile</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="edit-profile">
		<div class="row">
			<div class="col-12">
				<form class="card" method="POST" action="{{route('update-profile')}}">
					@method("put")
					@csrf
					<div class="card-header">
						<h4 class="card-title mb-0">Edit Profile</h4>
						<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
					</div>
					<div class="card-body">
						@if (session()->has('message'))
						<div class="alert alert-success">
							{{ session('message') }}
						</div>
					@endif
						<div class="row">
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">First Name</label>
									<input class="form-control @error('firstName') is-invalid @enderror" value="{{old('firstName', auth()->user()->FirstName)}}" name="firstName" type="text" placeholder="First Name">
									@error('firstName')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Last Name</label>
									<input class="form-control @error('lastName') is-invalid @enderror"value="{{old('lastName', auth()->user()->LastName)}}" name="lastName" type="text" placeholder="Last Name">
									@error('lastName')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Email address</label>
									<input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{old('email', auth()->user()->email)}}" placeholder="Email">
									@error('email')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer text-end">
						<button class="btn btn-primary" type="submit">Update Profile</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')

@endsection