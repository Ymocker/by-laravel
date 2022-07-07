<!DOCTYPE html>
<html lang="ru">

<head>

  @section('meta')
    @include('includes.meta')
  @show

  @yield('title')

  @include('includes.links')

</head>

<body>

  @include('frontend.includes.head')

  @section('nav')
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
      <a class="navbar-brand text-uppercase text-expanded d-lg-none" href="#">Б Е Л - Я Н Т Э Х</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">

  @show

  @yield('content')

  @include('includes.foot')

  @section('scripts')
    @include('includes.scripts')
  @show

</body>

</html>

