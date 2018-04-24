@extends('master')

@section('content')
  <div class="container">
    <div class="register-page-content">
      <div class="register-page-title">
        <h1 class="title">Slickk</h1>
      </div>
      <div class="register-page-form">
        <form action="{{ action('HomeController@create') }}" method="POST">
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
                <input name="email" type="email" class="form-control" placeholder="Email Address">
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
          @if ($errors->first('confirmed-password'))
            <div class="input-group mb-3 customed-warning">
              <div class="input-group-prepend customed-logo-warning">
                <span class="input-group-text">
                  <i class="fas fa-unlock-alt"></i>
                </span>
              </div>
              <input name="confirmed-password" type="password" class="form-control" placeholder="Re-Confirmed Password">
            </div>
            <div class="warning-message">
              {{ $errors->first('confirmed-password') }}
            </div>
          @else
            <div class="input-group mb-3 customed">
              <div class="input-group-prepend customed-logo">
                <span class="input-group-text">
                  <i class="fas fa-unlock-alt"></i>
                </span>
              </div>
              <input name="confirmed-password" type="password" class="form-control" placeholder="Re-Confirmed Password">
            </div>
          @endif
          @if ($errors->first('name'))
            <div class="input-group mb-3 customed-warning">
              <div class="input-group-prepend customed-logo-warning">
                <span class="input-group-text">
                  <i class="fas fa-address-card"></i>
                </span>
              </div>
                <input name="name" type="text" class="form-control" placeholder="Name">
            </div>
            <div class="warning-message">
              {{ $errors->first('name') }}
            </div>
          @else
            <div class="input-group mb-3 customed">
              <div class="input-group-prepend customed-logo">
                <span class="input-group-text">
                  <i class="fas fa-address-card"></i>
                </span>
              </div>
                <input name="name" type="text" class="form-control" placeholder="Name">
            </div>
          @endif
          @if ($errors->first('checking'))
            <div class="warning-message special">
              {{ $errors->first('checking') }}
            </div>
          @endif
          <div class="customed-button">
            <button type="submit" class="btn btn-primary make-oval" data-toggle="modal" data-target="#loadingModal">Register</button>
          </div>
          <div class="redirect-link">
            <a href="/login">Go back to login page</a>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
