<!DOCTYPE html>
<html lang="ru">

<head>

  @section ('meta')
    @include('includes.meta')
  @show

  @yield('title')

  @include('includes.links')

</head>

<body>

  @include('frontend.includes.head')



  @yield('content')

  @include('frontend.includes.foot')

  @include('includes.scripts')
  

</body>

</html>
