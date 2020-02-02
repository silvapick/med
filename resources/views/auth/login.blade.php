@extends('layouts.applogin')

@section('content')

<div class="container">
    <div class="row container-login">
      <div class="col-md-6 col-xs-10">
        <div class="card text-center">
          <div class="login100-form-title" style="background-image: url({{ asset('assets/lte/img/logo.png') }});"></div>
          <div class="card-body">
            <form action="{{ route('login') }}" method="post" accept-charset="utf-8">
              @csrf
              <div class="form-row">
                <div class="form-group col-12 col-md-8 col-md-offset-2">
                <input id="cedula" type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" autofocus>
                  @error('cedula')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group col-12 col-md-8 col-md-offset-2">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group col-12 col-md-8 col-md-offset-2">
                  <button class="btn btn-primary col-md-12" type="submit">
                    <i class=" fa fa-user-circle fa-2x"></i> {{ __('Login') }}</button>  
                </div>
              </div>
            </form>
          </div>
          <div class="card-footer text-muted">
            {{ __('Grupo Magin - LogIn') }}
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
