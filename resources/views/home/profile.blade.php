@extends('master')

@section('content')
  <div class="container profile-section">
    <div class="profile-image">
      <img src="{{ asset('images/cartoon-programmer-profile-picture.png') }}" class="rounded-circle"/>
    </div>
    <div class="profile-details">
      <div class="name">
        <span>{{ $user->name }}</span>
      </div>
      <div class="email">
        <span>{{ $user->email }}</span>
      </div>
      <div class="active-device">
        <span>{{ $active_device.' Active devices' }}</span>
      </div>
    </div>
  </div>
@endsection
