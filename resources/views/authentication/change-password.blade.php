@extends('layouts.authentication.master')
@section('title', 'Reset-password')

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
                  <div><a class="logo" href="{{ route('index') }}"><img class="img-fluid for-light" src="{{asset('assets/images/logo/login.png')}}" alt="looginpage"><img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt="looginpage"></a></div>
                  <div class="login-main">
                     <form class="theme-form" action="{{route('password.update')}}" method="POST">
                        @csrf

                        @if (session()->has('status'))
                        <div class="alert alert-success">
                           {{ session()->get('status') }}
                        </div>
                        @endif
                        <h4>Ubah Password</h4>
                        <div class="form-group">

                           <label class="col-form-label">Password Lama</label>
                           <input class="form-control @error('current_password') is-invalid @enderror" type="password" name="current_password" required="" placeholder="*********">
                           @error('current_password')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                           @enderror
                        </div>
                        <div class="form-group">

                           <label class="col-form-label">Password Baru</label>
                           <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required="" placeholder="*********">
                           @error('password')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label class="col-form-label">Password Baru Konfirmasi</label>
                           <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" required="" placeholder="*********">
                           @error('password_confirmation')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                           @enderror
                        </div>
                        <div class="form-group mb-0">
                           <button class="btn btn-primary btn-block" type="submit">Update Password </button>
                        </div>
                        <p class="mt-4 mb-0">Don't have account?<a class="ms-2" href="{{ route('sign-up') }}">Create Account</a></p>
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

@endsection