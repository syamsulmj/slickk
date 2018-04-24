@extends('master')

@section('content')
  <div class="container">
    <div class="edit-page">
      @if ($listed_device->count() > 0)
        @foreach ($listed_device as $device)
          <div class="row">
            <div class="col-md-12 listing-devices">
              <div class="main-div">
                <div class="device-information">
                  <span>Device Name: </span>
                  <br />
                  <span class="device-data">{{ Helpers::neat($device->device_title) }}</span>
                  <br />
                  <span>Port Name: </span>
                  <br />
                  <span class="device-data">{{ $device->device_port }}</span>
                </div>
              </div>
              <div class="edit-div">
                <button class="btn btn-outline-danger" data-toggle="modal" data-target="#{{ Helpers::raw($device->device_title).'-delete' }}">Delete</button>
                <button class="btn btn-outline-primary" data-toggle="modal" data-target="#{{ Helpers::raw($device->device_title) }}">Edit</button>
              </div>
            </div>
          </div>

          <!-- Modal Edit -->
          <div class="modal fade" id="{{ Helpers::raw($device->device_title) }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">{{ Helpers::neat($device->device_title) }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post" action="{{ action('ListedDevicesController@update_device') }}">
                  {{ csrf_field() }}
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Device Name:</label>
                      <input type="hidden" name="old-device-name" value="{{ $device->device_title }}"/>
                      <input name="device-name" class="form-control" value="{{ Helpers::neat($device->device_title) }}"/>
                    </div>
                    <div class="form-group">
                      <label>Device Port Name:</label>
                      <input name="device-port" class="form-control" value="{{ $device->device_port }}"/>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Modal Delete -->
          <div class="modal fade" id="{{ Helpers::raw($device->device_title).'-delete' }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Remove {{ Helpers::neat($device->device_title) }}?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <strong>Do you really wish to remove this device?</strong>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                  <a href="{{ '/delete-device/'.session('email').'/'.Helpers::raw($device->device_title) }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-device-form').submit();">Yes</a>
                  <form style="display: none;" id="delete-device-form" action="{{ '/delete-device/'.session('email').'/'.Helpers::raw($device->device_title) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                  </form>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @else
        <div class="edit-page-no-device">
          <div class="no-device-content">
            <span>There is no devices has been registered</span>
            <br />
            <a href="{{ action('ListedDevicesController@index') }}" class="btn btn-info">Add new device</a>
          </div>
        </div>
      @endif
    </div>
  </div>
@endsection
