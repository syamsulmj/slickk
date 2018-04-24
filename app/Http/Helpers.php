<?php

namespace App\Http;
use Illuminate\Support\Facades\Storage;

class Helpers
{

  public static function neat ($slug) {
    $neat = str_replace("-", " ", $slug);

    return ucwords($neat);
  }

  public static function raw ($slug) {
    $raw = str_replace(" ", "-", strtolower($slug));

    return $raw;
  }
}
