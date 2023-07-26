@extends('layouts.simple.master')
@section('title', 'Edit Profile')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">

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

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Ubah Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form class="card" method="POST" action="{{ route('update-password') }}">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="mb-6">
                                        <label for="current_password">Password Lama </label>
                                        <input required class="form-control" name="current_password" id="current_password"
                                            type="password" placeholder="Masukkan Password Lama">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col">
                                    <div class="mb-6">
                                        <label for="new_password">Password Baru </label>
                                        <input required class="form-control" name="new_password" id="new_password"
                                            type="password" placeholder="Masukkan Password Baru">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="new_password_confirmation">Password Baru Konfirmasi </label>
                                <input required class="form-control" name="new_password_confirmation"
                                    id="new_password_confirmation" type="password" placeholder="Masukkan Password Lama">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-12">
                    <form class="card" method="POST" action="{{ route('update-profile') }}">
                        @method('put')
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title mb-0">Edit Profile</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#"
                                    data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                    class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                        class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                                @elseif (session()->has('alertPass'))
                                <div class="alert alert-danger">
                                    {{ session()->get('alertPass') }}
                                </div>
                            @elseif(session()->has('messagePassword'))
                                <div class="alert alert-danger">
                                    {{ session()->get('messagePassword') }}
                                </div>
                            @endif
                      
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">First Name</label>
                                            <input class="form-control @error('firstName') is-invalid @enderror"
                                                value="{{ old('firstName', auth()->user()->FirstName) }}" name="firstName"
                                                type="text" placeholder="First Name">
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
                                            <input class="form-control @error('lastName') is-invalid @enderror"
                                                value="{{ old('lastName', auth()->user()->LastName) }}" name="lastName"
                                                type="text" placeholder="Last Name">
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
                                            <input class="form-control @error('email') is-invalid @enderror" type="email"
                                                name="email" value="{{ old('email', auth()->user()->email) }}"
                                                placeholder="Email">
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
                            <button class="btn btn-success" type="button" data-bs-toggle="modal"
                                data-bs-target="#myModal">Ubah Password</button>

                            <button class="btn btn-primary" type="submit">Update Profile</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/modal-animated.js') }}"></script>

@endsection
