@extends('layouts.authentication.master')
@section('title', 'Sign-up')

@section('css')
@endsection

@section('style')
@endsection


@section('content')
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
                            <form action="/authentication/signup"method="post" novalidate="" class="theme-form">
                                @csrf

                                <h4>Create your account</h4>
                                <p>Enter your personal details to create account</p>
                                <div class="form-group">
                                    <label class="col-form-label pt-0">Your Name</label>
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <input class="form-control" name="firstName" type="text" required=""
                                                placeholder="First name">
                                            <div class="invalid-feedback">Please provide a valid city.</div>

                                        </div>
                                        <div class="col-6">
                                            <input class="form-control" name="lastName" type="text" required=""
                                                placeholder="Last name">
                                            <div class="invalid-feedback">Please provide a valid city.</div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Email Address</label>
                                    <input class="form-control" type="email" name="email" required=""
                                        placeholder="Test@gmail.com">

                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <input class="form-control" type="password" name="password" required=""
                                        placeholder="*********">
                                    <div class="show-hide"><span class="show"></span></div>


                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Confirm Password</label>
                                    <input class="form-control" name="password_confirmation" type="password" required=""
                                        placeholder="*********">
                                    <div class="show-hide"><span class="show"></span></div>


                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit">Create Account</button>
                                </div>
                                <p class="mt-4 mb-0">Already have an account?<a class="ms-2"
                                        href="{{ route('login') }}">Sign in</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/notify/index.js') }}"></script>
    <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>

@endsection
