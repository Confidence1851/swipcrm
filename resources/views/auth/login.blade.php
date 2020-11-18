@extends('layout.master2')
@section('content')
<div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col-md-4 pr-md-0">
            <div class="auth-left-wrapper" style="background-image: url({{ url('assets2/img/hero/parcelbox.jpg') }})">

            </div>
          </div>
          <div class="col-md-8 pl-md-0">
            <div class="auth-form-wrapper px-4 py-5">
              <a href="/" class="noble-ui-logo d-block mb-2" >Swipcrm</a>
              {{--  <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your account.</h5>  --}}
              <form class="forms-sample" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                  <label for="name" >Username</label>
                  <input class="form-control" id="username" placeholder="Your Username" type="text" class="form-control" name="username" value="{{ old('email') }}" required autocomplete="name" autofocus>
                  @if ($errors->has('username'))
                  <span class="help-block">
                      <strong>{{ $errors->first('username') }}</strong>
                  </span>
                 @endif
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="password" >Password</label>
                  <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                  @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
                </div>
                <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label" for="remember">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="form-check-input">
                        {{ __('Remember Me') }}
                  </label>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success mr-2 mb-2 mb-md-0">
                        {{ __('Login') }}
                    </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection