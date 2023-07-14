@extends('layouts.authentication.master')
@section('title', 'Forget-password')

@section('css')
@endsection

@section('style')
@endsection


@section('content')
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="login-card">
                        <div>
                            <div><a class="logo" href="{{ route('index') }}"><img class="img-fluid for-light"
                                        src="{{ asset('assets/images/logo/login.png') }}" alt="looginpage"><img
                                        class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo_dark.png') }}"
                                        alt="looginpage"></a></div>
                            <div class="login-main">
                                <form action="{{route('password.email')}}" class="theme-form" method="POST">
                                 @csrf
                          
                                    @if (session()->has('status'))
                                        <div class="alert alert-success">
                                            {{ session()->get('status') }}
                                        </div>
                                    @endif
                                    <h4>Forget Password</h4>
                                    <div class="form-group">
                                        <label class="col-form-label">Enter Your Email </label>
                                        <div class="row">
                                          <div class="form-group">
                                             <label class="col-form-label"></label>
                                             <input class="form-control @error('email') is-invalid @enderror" name="email"
                                                 placeholder="Input email" type="email" value="{{ old('email') }}" required="">
                                             @error('email')
                                                 <div class="invalid-feedback">
                                                     {{ $message }}
                                                 </div>
                                             @enderror
                                         </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-block m-t-10"
                                                    type="submit">Request Password Link</button>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <p class="mt-4 mb-0">Already have an password?<a class="ms-2"
                                            href="{{ route('login') }}">Sign in</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
@endsection
