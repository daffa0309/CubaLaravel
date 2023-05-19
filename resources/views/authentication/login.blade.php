@extends('layouts.authentication.master')
@section('title', 'Login')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
@if (Session::has('message'))
   <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div>
                        <div><a class="logo" href="{{ route('index') }}"><img class="img-fluid for-light"
                                    src="{{ asset('assets/images/logo/login.png') }}" alt="looginpage"><img
                                    class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo_dark.png') }}"
                                    alt="looginpage"></a></div>
                        <div class="login-main">
                            <form action="/authentication/login" novalidate="" method="post" class="theme-form">
                                @csrf

                                <h4>Sign in to account</h4>
                                <p>Enter your Email & password to login</p>
                                <div class="form-group">
                                    <label class="col-form-label">Email</label>
                                    <input class="form-control" name="email"
                                      placeholder="Input email"  type="email" required="" >
                                 
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <input class="form-control" type="password" name="password" required=""
                                        placeholder="*********">
                                </div>
                                <div class="form-group mb-0">
                                    {{-- <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox">
                                        <label class="text-muted" for="checkbox1">Remember password</label>
                                    </div>
                                    <a class="link" href="{{ route('forget-password') }}">Forgot password?</a> --}}
                                    <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                                </div>
                              
                                <p class="mt-4 mb-0">Don't have account?<a class="ms-2"
                                        href="{{ route('sign-up') }}">Create Account</a></p> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
