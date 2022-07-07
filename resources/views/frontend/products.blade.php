@extends('frontend.layouts.master')

@section('meta')
    @parent
    <meta name="description" content="Продукция">
	<title>Бел-Янтэх. Карамель леденцовая фигурная. Продукция.</title>
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
          <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/products">Продукция</a>
          </li>
          <li class="nav-item px-lg-4">
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
    <div class="container">
      <a href="/catalog/1#top"><div class="product-item">
        <div class="product-item-title d-flex">
          <div class="bg-faded p-5 d-flex ml-auto rounded">
            <h2 class="section-heading mb-0">
              <span class="section-heading-upper">Оригинальная</span>
              <span class="section-heading-lower">Фигурная</span>
            </h2>
          </div>
        </div>
        <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="siteimg/products-01.jpg" alt="">
        <div class="product-item-description d-flex mr-auto">
          <div class="bg-faded p-5 rounded">
            <p class="mb-0">Возможно изготовление конфет по индивидуальному заказу с изготовлением форм по рисункам заказчика.</p>
          </div>
        </div></a>
      </div>
    </div>
  </section>

  <section class="page-section">
    <div class="container">
      <a href="/catalog/1#top"><div class="product-item">
        <div class="product-item-title d-flex">
          <div class="bg-faded p-5 d-flex mr-auto rounded">
            <h2 class="section-heading mb-0">
              <span class="section-heading-upper">Яркая</span>
              <span class="section-heading-lower">Много&shy;цветная</span>
            </h2>
          </div>
        </div>
        <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="siteimg/products-02.jpg" alt="">
        <div class="product-item-description d-flex ml-auto">
          <div class="bg-faded p-5 rounded">
            <p class="mb-0">Мы можем изменить вкус и цвет по вашему желанию. Нет предела совершенству.</p>
          </div>
        </div>
      </div></a>
    </div>
  </section>

  <section class="page-section">
    <div class="container">
      <a href="/catalog/1#top"><div class="product-item">
        <div class="product-item-title d-flex">
          <div class="bg-faded p-5 d-flex ml-auto rounded">
            <h2 class="section-heading mb-0">
              <span class="section-heading-upper">Своевременная</span>
              <span class="section-heading-lower">К празд&shy;никам</span>
            </h2>
          </div>
        </div>
        <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="siteimg/products-03.jpg" alt="">
        <div class="product-item-description d-flex mr-auto">
          <div class="bg-faded p-5 rounded">
            <p class="mb-0">В жизни всегда есть место празднику. Конфеты подходят для этого как нельзя лучше. Особенно, если их форма соответствует этому празднику.</p>
          </div>
        </div>
      </div></a>
    </div>
  </section>
@endsection