<!DOCTYPE html>
<html lang="ru">

<head>

  @section('meta')
    @include('backend.includes.meta')
  @show

  <!--@yield('title') -->

  @section('links')
    @include('backend.includes.links')
  @show

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('backend.includes.preloader')

    @include('backend.includes.sidebar')



    @yield('content')

    @include('backend.includes.foot')


</div>
<!-- ./wrapper -->

@section('scripts')
    @include('backend.includes.scripts')
@show
</body>

</html>

