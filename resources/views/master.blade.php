<!--
  Author: Syamsul Mohd Jafri
  Email: syamsulmj94@gmail.com
  Github: github.com/syamsulmj
-->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/slickk_logo.png') }}">
    <script src="{{asset('/js/app.js')}}"></script>
    @if (session('login?'))
      <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
      <script>
        var OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
          OneSignal.init({
            appId: "e52922af-3af2-4876-abeb-8a85392651cb",
          });
        });
      </script>
    @endif
    <title>Slickk</title>
  </head>
  @if (url()->current() == action('HomeController@loginPage') || url()->current() == action('HomeController@register'))
    <body class="login-page">
      @yield('content')
    </body>
  @else
    <body class="default-body">
      @include('shared.navbar')
      @yield('content')
    </body>
  @endif
  @include('shared.loading_modal')

</html>
