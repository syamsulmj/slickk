<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ListedDevice;

class DataController extends Controller
{
    public function get_port($email, $instruction) {

      $listed_device = ListedDevice::all()->where('email', $email);
      $seperator = explode("-", $instruction);
      $edited_instruction = array();
      $getting_instruction = array();
      $checker = false;
      $instruction_text = null;

      foreach ($seperator as $data) {
        if ($data == "turn") {
          $edited_instruction[] = $data;
        }

        if($data == "on" || $data == "off") {
          $edited_instruction[] = $data;
        }

        foreach ($listed_device->pluck('device_title') as $title) {
          $seperate_title = explode("-", $title);

          foreach ($seperate_title as $title_data) {
            if($data == $title_data) {
              $edited_instruction[] = $data;
              $checker = true;
              break;
            }
          }
          if($checker) {
            $checker = false;
            break;
          }
        }
      }

      foreach ($edited_instruction as $data) {
        if($data == 'on' || $data == 'off') {
          $high_low = $data == 'on'? 1 : 0;
        }
        if($data != 'turn' && $data != 'on' && $data != 'off') {
          $getting_instruction[] = $data;
        }
      }

      for($i=0; $i<count($getting_instruction); $i++) {
        if($i != count($getting_instruction)-1) {
          $instruction_text .= $getting_instruction[$i].'-';
        }
        else {
          $instruction_text .= $getting_instruction[$i];
        }
      }

      $get_status = ListedDevice::where('device_title', $instruction_text)->first();

      if($get_status) {
        $json_data = array(
          'success' => true,
          'device_port' => $get_status->device_port,
          'high_low' => $high_low
        );

        $update = [
          'status' => $high_low
        ];

        if($get_status->status != $high_low) {
          ListedDevice::where('device_title', $instruction_text)->update($update);
        }

        return json_encode($json_data, JSON_PRETTY_PRINT);
      }
      else {
        $json_data = array(
          'success' => false,
          'device_port' => '',
          'high_low' => '',
          'instruction' => $instruction_text
        );
        return json_encode($json_data, JSON_PRETTY_PRINT);
      }

    }

    public function mobile_update($email) {

      $listed_device = ListedDevice::all()->where('email', $email);

      return json_encode($listed_device);
    }
}
