<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.widgets.head')
</head>
<body>
  <div class="container-scroller">
    @include('backend.widgets.narbar')
    <div class="container-fluid page-body-wrapper">
        @include('backend.widgets.menu')
      <div class="main-panel">
        <div class="content-wrapper">
            @yield('content')
        </div>
        @include('backend.widgets.footer')
      </div>
    </div>
  </div>
  @include('backend.widgets.js')
</body>

</html>


