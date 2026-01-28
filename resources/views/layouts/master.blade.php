<!doctype html>
<html lang="en">
  <head>
    @include('layouts.head')
  </head>
  <body>
  <div class="container">
    @include('layouts.menu')
    @yield('main-content')
  </div>

    @include('layouts.footer')

  </body>
</html>