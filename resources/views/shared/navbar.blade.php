<nav class="navbar navbar-expand-lg navbar-dark bg-dark customed-navbar">
  <a class="navbar-brand navbar-title" href="/">Slickk</a>
  <button class="navbar-toggler customize-color" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="fas fa-bars"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      @if (url()->current() == action('HomeController@index'))
        <li class="nav-item active">
      @else
        <li class="nav-item">
      @endif
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      @if (url()->current() == action('ListedDevicesController@index'))
        <li class="nav-item active">
      @else
        <li class="nav-item">
      @endif
        <a class="nav-link" href="{{ action('ListedDevicesController@index') }}">Add New Device</a>
      </li>
      @if (url()->current() == action('ListedDevicesController@edit_device'))
        <li class="nav-item active">
      @else
        <li class="nav-item">
      @endif
        <a class="nav-link" href="{{ action('ListedDevicesController@edit_device') }}">Edit Device</a>
      </li>
      @if (url()->current() == action('HomeController@show_profile'))
        <li class="nav-item active">
      @else
        <li class="nav-item">
      @endif
        <a class="nav-link" href="{{ action('HomeController@show_profile') }}">Profile</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ action('HomeController@logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" method="post" action="{{ action('HomeController@logout') }}" style="display: none;">
          {{ csrf_field() }}
        </form>
      </li>
    </ul>
  </div>
</nav>
