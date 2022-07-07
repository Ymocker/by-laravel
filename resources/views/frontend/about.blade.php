@extends('frontend.layouts.master')

@section('meta')
  @parent
  <meta name="description" content="Производство карамели леденцовой. О нас">
  <title>Бел-Янтэх. Карамель леденцовая фигурная. О нас.</title>
@endsection

@section('nav')
  @parent
        <ul class="navbar-nav mx-auto">
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/index">Главная
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/about">О нас</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/products">Продукция</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/catalog/1#top">Каталог</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="contact">Контакты</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
@endsection

@section('content')
  <section class="page-section about-heading">
    <div class="container">
      <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="siteimg/about.jpg" alt="">
      <div class="about-heading-content">
        <div class="row">
          <div class="col-xl-9 col-lg-10 mx-auto">
            <div class="bg-faded rounded p-5">
              <h2 class="section-heading mb-4">
                <span class="section-heading-upper">Мы всегда открыты для сотрудничества</span>
                <span class="section-heading-lower">О нашем предприя&shy;тии</span>
              </h2>
              <p>Предприятие "Бел-Янтэх" выпускает леденцы на палочке различной формы, цвета и вкуса по технологии и рецептуре ПТСП "Янтекс" (Польша) с 2004 года. Вся карамель отливается в ручную. Каждая конфета упакована в прозрачный пакетик из полипропилена, что дает возможность увидеть качество карамельной массы на просвет.</p>
              <p class="mb-0">Затем конфеты упаковываются в прозрачные пластиковые тубусы или шоу-боксы. Также возможна упаковка по желанию заказчика. Количество конфет в упаковке зависит от их размера и веса.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection