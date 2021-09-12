@extends('layouts.adminLogin')
@section('content')

<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

<div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
  <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Saed Store <span class="tx-info tx-normal">admin</span></div>
  <div class="tx-center mg-b-60">Ecommerce Admin Login</div>

  <form action="{{ route('admin.login.post') }}" method="POST">
      @csrf
  <div class="form-group">
    <input type="email" class="form-control" @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
  </div><!-- form-group -->

  @error('email')
  <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
  </span>
    @enderror

   

  <div class="form-group">
    <input type="password" class="form-control" @error('password') is-invalid @enderror name="password" required autocomplete="current-password" placeholder="Password">
    <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
  </div><!-- form-group -->

  <div class="form-group">
    <div class="utility">
        <div class="animated-checkbox">
            <label>
                <input type="checkbox" name="remember"><span class="label-text">Stay Signed in</span>
            </label>
        </div>
    </div>
</div>

  @error('password')
  <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
  </span>
    @enderror

  <button type="submit" class="btn btn-info btn-block">Sign In</button>
  </form>
</div><!-- login-wrapper -->
</div><!-- d-flex -->


@endsection