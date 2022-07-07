@extends('frontend.layouts.master')

@section('meta')
  @parent
  <meta name="description" content="Производство карамели леденцовой">
  <title>Бел-Янтэх. Карамель леденцовая фигурная.</title>
@endsection

@section('nav')
  @parent
        <ul class="navbar-nav mx-auto">
          <li class="nav-item active px-lg-4">
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
  <section class="page-section clearfix">
    <div class="container">
      <div class="intro">
        <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="siteimg/intro.jpg" alt="">
        <div class="intro-text left-0 text-center bg-faded p-5 rounded">
          <h2 class="section-heading mb-4">
            <span class="section-heading-upper">ЛЕДЕНЦЫ НА ПАЛОЧКЕ</span>
            <span class="section-heading-lower">СТОИТ ПОПРОБО&shy;ВАТЬ</span>
          </h2>
          <p class="mb-3">Всевозможные виды и размеры леденцов. Огромное разнообразие вкусов. Яркая цветовая палитра.
          </p>
          <div class="intro-button mx-auto">
            <a class="btn btn-primary btn-xl" href="contact">Мы ждем Вас!</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="page-section cta">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <div class="cta-inner text-center rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-upper">БЕЛ-ЯНТЭХ</span>
              <span class="section-heading-lower">Собствен&shy;ное производ&shy;ство</span>
            </h2>
            <p class="mb-0">Обращайтесь к нам и приобретайте конфеты из первых рук, от изготовителя.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection