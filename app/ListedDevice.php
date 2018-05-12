<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListedDevice extends Model
{
    protected $fillable = [
      'email', 'device_title', 'device_port', 'device_type', 'status',
    ];
}
