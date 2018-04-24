@extends('master')


@section('content')
  <div class="container">
    <div class="home-page">
      @if ($devices->count() > 0)
        @foreach ($devices as $device)
          <div class="row home-page-content">
            <div class="col-md-12 listing-devices">
              <div class="main-div">
                <div class="device-title">
                  <span>{{ Helpers::neat($device->device_title) }}</span>
                  <span>(Port {{ $device->device_port }})</span>
                </div>
                <div class="device-instruction">
                  <p>
                    Say "Turn ON {{ Helpers::neat($device->device_title) }}" to turn ON the device
                    <br />
                    Say "Turn OFF {{ Helpers::neat($device->device_title) }}" to turn OFF the device
                  </p>
                </div>
              </div>
              <div class="status-div">
                <div class="device-status">
                  @if ($device->status)
                    <a href="/update-status/{{ session('email') }}/{{ $device->device_title }}" class="btn btn-success">ON</a>
                  @else
                    <a href="/update-status/{{ session('email') }}/{{ $device->device_title }}" class="btn btn-danger">OFF</a>
                  @endif

                </div>
              </div>
            </div>
          </div>
        @endforeach
      @else
        <div class="home-page-content-no-device">
          <div class="no-device-content">
            <span>There is no devices has been registered</span>
            <br />
            <a href="{{ action('ListedDevicesController@index') }}" class="btn btn-info">Add new device</a>
          </div>
        </div>
      @endif
  </div>
@endsection
