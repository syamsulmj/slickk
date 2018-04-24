@extends('master')

@section('content')
  <div class="container">
    <div class="login-page-content">
      <div class="login-page-title">
        <h1 class="title">Slickk</h1>
      </div>
      <div class="login-page-form">
        <form action="{{ action('HomeController@login') }}" method="POST">
          {{ csrf_field() }}
          @if ($errors->first('email'))
            <div class="input-group mb-3 customed-warning">
              <div class="input-group-prepend customed-logo-warning">
                <span class="input-group-text">
                  <i class="fas fa-user"></i>
                </span>
              </div>
              <input name="email" type="email" class="form-control" placeholder="Email Address">
            </div>
            <div class="warning-message">
              {{ $errors->first('email') }}
            </div>
            
          @else
            <div class="input-group mb-3 customed">
              <div class="input-group-prepend customed-logo">
                <span class="input-group-text">
                  <i class="fas fa-user"></i>
                </span>
              </div>
              @if (session('email'))
                <input name="email" type="text" class="form-control" placeholder="Email Address" value="{{ session('email') }}">
              @else
                <input name="email" type="text" class="form-control" placeholder="Email Address">  
              @endif
            </div>
          @endif
          @if ($errors->first('password'))
            <div class="input-group mb-3 customed-warning">
              <div class="input-group-prepend customed-logo-warning">
                <span class="input-group-text">
                  <i class="fas fa-key"></i>
                </span>
              </div>
              <input name="password" type="password" class="form-control" placeholder="Password">
            </div>
            <div class="warning-message">
              {{ $errors->first('password') }}
            </div>
          @else
            <div class="input-group mb-3 customed">
              <div class="input-group-prepend customed-logo">
                <span class="input-group-text">
                  <i class="fas fa-key"></i>
                </span>
              </div>
              <input name="password" type="password" class="form-control" placeholder="Password">
            </div>
          @endif
          @if ($errors->first('status'))
            <div class="warning-message special">
              {{ $errors->first('status') }}
            </div>
          @endif
          <div class="customed-button">
            <a href="{{ action('HomeController@register') }}" class="btn btn-info make-oval">Register</a>
            <button type="submit" class="btn btn-primary make-oval" data-toggle="modal" data-target="#loadingModal">Sign In</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection