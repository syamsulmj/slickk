@extends('master')

@section('content')
  <div class="container list-device">
    <div class="list-device-content">
      <div class="list-device-title">
        <span>Add new device</span>
      </div>
      <div class="list-device-form-content">
        <form action="{{ action('ListedDevicesController@create') }}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="form-label" for="device-name">Device Name</label>
            @if ($errors->first('device-name'))
              <input class="form-control warning-input" placeholder="Device name" name="device-name"/>
              <div class="warning-text">
                <span>{{ $errors->first('device-name') }}</span>
              </div>
            @else
              <input class="form-control" placeholder="Device name" name="device-name"/>
            @endif
          </div>
          <div class="form-group">
            <label class="form-label" for="device-port">Port Name</label>
            @if ($errors->first('device-port'))
              <input class="form-control warning-input" placeholder="Device port name (eg port: 4)" name="device-port"/>
              <div class="warning-text">
                <span>{{ $errors->first('device-port') }}</span>
              </div>
            @else
              <input class="form-control" placeholder="Device port name (eg port: 4)" name="device-port"/>
            @endif
          </div>
          <div class="form-group col-md-4 no-padding">
            <label for="device-type">Example select</label>
            <select class="form-control" id="device-type" name="device-type">
              <option>Normal Device</option>
              <option>Servo Motor</option>
              <option>Sensor Device</option>
            </select>
          </div>
          <div class="informative-text">
            <span>Please note that you need to turn OFF your device first before integrate with the system.</span>
          </div>
          <div class="customed-button">
            <button class="btn btn-primary">Add device</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
