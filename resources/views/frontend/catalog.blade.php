@extends('frontend.layouts.master')

@section('meta')
    @parent
    <meta name="description" content="Каталог продукции">
    <title>Бел-Янтэх. Карамель леденцовая фигурная. Каталог продукции.</title>
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
              <span class="section-heading-lower">Вся продукция</span>
            </h2>

	  <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Бел-Янтэх</h1>
        <div class="list-group sidemenu">
          <a href="/catalog/1#top" class="list-group-item btn">Вся продукция</a>
          <a href="/catalog/2#top" class="list-group-item btn">Леденцы до 30 г</a>
          <a href="/catalog/3#top" class="list-group-item btn">Леденцы от 30 г</a>
	  <a href="/catalog/4#top" class="list-group-item btn">К празднику</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="row">

            @foreach ($candies as $candy)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="/candy/{{ $candy->id }}#top"><img class="card-img-top" src="/img/{{ $candy->picture }}.jpg" alt=""></a>
                      <div class="card-body">
                        <h4 class="card-title">
                          <a href="candy">{{ $candy->name }}</a>
                        </h4>
                        <h5>{{ $candy->mass }} г</h5>
                        <p class="card-text">{{ $candy->taste }}</p>
                      </div>
                    </div>
                  </div>
            @endforeach

        </div>
          {{ $candies->links() }}
        <!-- /.row -->
 <!--       <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
              <li class="page-item"><a class="page-link" href="#">«</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
        </nav>
 -->
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