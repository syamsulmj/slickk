<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\ListedDevice;
use App\Http\Helpers;

class ListedDevicesController extends Controller
{
    public function index() {

      if(session('login?')) {
        return view('listdevice.index');
      }
      else {
        return redirect()->action('HomeController@loginPage');
      }

    }

    public function create (Request $request) {

      $request->validate([
        'device-name' => 'required',
        'device-port' => 'required'
      ]);

      $email = session('email');
      $device_name = Helpers::raw($request->input('device-name'));
      $device_type;

      if ($request->input('device-type') == 'Normal Device') {
        $device_type = 'ND';
      }

      elseif ($request->input('device-type') == 'Servo Motor') {
        $device_type = 'SM';
      }

      elseif ($request->input('device-type') == 'Sensor Device') {
        $device_type = 'SD';
      }

      ListedDevice::create([
        'email' => Crypt::decrypt($email),
        'device_title' => $device_name,
        'device_port' => $request->input('device-port'),
        'device_type' => $device_type,
        'status' => false
      ]);

      return redirect()->action('HomeController@index');
    }

    public function update_status($email, $device_name) {

      $decrypt_email = Crypt::decrypt($email);
      $current_status = ListedDevice::where('email', $decrypt_email)->where('device_title', $device_name)->first()->status;

      if($current_status) {
        $update_status = false;
      }
      else {
        $update_status = true;
      }
      $update = [
        'status' => $update_status
      ];

      ListedDevice::where('email', $decrypt_email)->where('device_title', $device_name)->update($update);

      return back();
    }

    public function edit_device() {

      if(session('login?')) {
        $decrypt_email = Crypt::decrypt(session('email'));
        $listed_device = ListedDevice::all()->where('email', $decrypt_email);

        return view(
          'listdevice.edit',
          compact('listed_device')
        );
      }
      else {
        return redirect()->action('HomeController@loginPage');
      }
    }

    public function delete_device($email, $device_title) {

      $decrypt_email = Crypt::decrypt($email);
      ListedDevice::where('email', $decrypt_email)->where('device_title', $device_title)->delete();

      return back();
    }

    public function update_device(Request $request) {

      $request->validate([
        'device-name' => 'required',
        'device-port' => 'required'
      ]);

      $device_title = Helpers::raw($request->input('device-name'));
      $device_port = $request->input('device-port');
      $old_device_title = $request->input('old-device-name');

      $update = [
        'device_title' => $device_title,
        'device_port' => $device_port
      ];

      $decrypt_email = Crypt::decrypt(session('email'));

      ListedDevice::where('email', $decrypt_email)->where('device_title', $old_device_title)->update($update);

      return back();
    }
}
