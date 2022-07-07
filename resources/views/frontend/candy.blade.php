@extends('frontend.layouts.master')

@section('meta')
    @parent
    <meta name="description" content="candy">
    <title>Бел-Янтэх. Карамель леденцовая фигурная.</title>
@endsection

@section('nav')
  @parent
        <ul class="navbar-nav mx-auto">
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/index">Главная
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/about">О нас</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/products">Продукция</a>
          </li>
          <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/catalog/1#top">Каталог</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/contact">Контакты</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
@endsection

@section('content')
  <section class="page-section">
  <a name="top"></a>

    <div class="cat">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <div class="cta-inner text-center rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-upper">карамель леденцовая фигурная</span>
              <span class="section-heading-lower">{{ $candy->name }}</span>
            </h2>

	  <div class="row">

      <div class="col-lg-3">

        <!--<h1 class="my-4">Бел-Янтэх</h1>-->
        <div class="list-group">
          <a href="/catalog/1#top" class="list-group-item btn">Вся продукция</a>
          <a href="/catalog/2#top" class="list-group-item btn">Леденцы меньше 30 г</a>
          <a href="/catalog/3#top" class="list-group-item btn">Леденцы от 30 г</a>
          <a href="/catalog/4#top" class="list-group-item btn">К празднику</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="row">

          <div class="col-lg-8 col-md-6 mb-4">
            <div class="card h-100">


                    <div id="slider">
                        <div class="slide">
                            <img class="card-img-top" src="/img/{{ $candy->picture }}.jpg" alt="">
                        </div>
                        <div class="slide">
                            <img class="card-img-top" src="/img/{{ $candy->picture }}u.jpg" alt="">
                        </div>
                    </div>


            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5>Масса: {{ $candy->mass }} г</h5>
                <hr>
                <h5>Вкус: {{ $candy->taste }}</h5>
                <hr>
                <h5>Количество {{ $pack1 }}: {{ $candy->shbqty }} шт</h5>
                <hr>
                <h5>Количество {{ $pack2 }}<br>в гофротаре: {{ $candy->boxqty }}</h5>
                <hr>
                <h5>Размеры гофротары: {{ $box }} мм</h5>
              </div>
            </div>
          </div>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

          </div>
        </div>
      </div>
    </div>
<!--
      </div>
    </div>
-->
  </section>
@endsection

