@extends('frontend.layouts.master')

@section('meta')
    @parent
    <meta name="description" content="Контактная информация">
    <title>Бел-Янтэх. Карамель леденцовая фигурная. Контактная информация.</title>
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
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/catalog/1#top">Каталог</a>
          </li>
          <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/contact">Контакты</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
@endsection

@section('content')
    <section class="page-section cta">
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <div class="cta-inner text-center rounded">
              <h2 class="section-heading mb-5">
                <span class="section-heading-upper">Контакты</span>
                <span class="section-heading-lower">Наши коорди&shy;наты</span>
              </h2>
              <ul class="list-unstyled list-hours mb-5 text-left mx-auto">
                <li class="list-unstyled-item list-hours-item d-flex">
                  Частное предприятие «Бел-Янтэх».
                  <!--<span class="ml-auto">!</span>-->
                </li>
                <li class="list-unstyled-item list-hours-item d-flex">
                  Мы располагаемся по адресу:<br>
				  Республика Беларусь, Витебский район,<br>
				  аг. Октябрьская, ул. Центральная, 4, к. 1
                  <!--<span class="ml-auto">!</span>-->
                </li>
                <li class="list-unstyled-item list-hours-item d-flex">
                  Связаться с нами можно по телефонам:<br>
				  тел. +375(29) 677-16-81, +375(212) 69-39-79; факс +375(212) 69-39-69
                  <!--<span class="ml-auto">!</span>-->
                </li>
                <li class="list-hours-item">
                  А также, по электронной почте<br>
				  e-mail:
				  <a class="foremail" href="mailto:kalinin601@mail.ru" target="_blank">kalinin601@mail.ru</a>
                </li>
                <li class="list-unstyled-item list-hours-item d-flex">
                  или, заполнив форму ниже
                </li>
              </ul>

            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="page-section about-heading">
      <div class="container">
        <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="/siteimg/write.jpg" alt="">
        <div class="about-heading-content">
          <div class="row">
            <div class="col-xl-9 col-lg-10 mx-auto">
              <div class="bg-faded rounded p-5">
                <h2 class="section-heading mb-4">
                  <span class="section-heading-upper">Мы ответим на ваши вопросы</span>
                  <span class="section-heading-lower">Свяжитесь с нами</span>
                </h2>

                <div class="col-lg-10 col-md-8 col-xs-12 about">
                    {!! Form::open(['url' => '/about/send/message', 'id' => 'contactForm',  'role' => 'form']) !!}
                        <div class="row">
                            <div class="form-group col-sm-4">
                                {!! Form::label('name', 'Ваше&nbsp;имя') !!}
                                {!! Form::input('text', 'name', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Имя']) !!}
                            </div>
                            <div class="form-group col-sm-4">
                                {!! Form::label('email', 'E-mail') !!}
                                {!! Form::input('text', 'email', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'e-mail']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('message', 'Сообщение') !!}
                            {!! Form::textarea('message', null, ['class' => 'form-control', 'rows' => 5, 'required' => true, 'placeholder' => 'Сообщение']) !!}
                        </div>
                        {!! Form::submit('Отправить',['class' => 'btn btn-primary pull-right g-recaptcha', 'id' => 'form-submit',
                                                      'data-sitekey' => '6Lf3XbEZAAAAAC3LEfTf6es85tppezklzwx2lJzM',
                                                      'data-callback' => 'onSubmit', 'data-action' => 'submit']) !!}
                        <div id="msgSubmit" class="h3 text-center">&nbsp;</div>
                    {!! Form::close() !!}
                </div>



              </div>
            </div>
          </div>
        </div>
      </div>


        <div id="myModal">
          <p>Сообщение<br>отправлено</p>
          <span id="myModal__close" class="close">ₓ</span>
        </div>
        <div id="myOverlay"></div>

    </section>
@endsection

@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js"></script>

    @parent

    <script>
    function onSubmit(token) {
        $("#form-submit").hide();
        $.ajax({
            url:     "about/send/message",
            type:     "POST",
            dataType: "html",
            data: $("#contactForm").serialize(),
            success: function(response) { //Данные отправлены успешно
                if (response == "mailok") {
                    $("#contactForm")[0].reset();

                    $('#myOverlay').fadeIn(297,	function(){
                        $('#myModal')
                        .css('display', 'block')
                        .animate({opacity: 1}, 198);
                    });

                    $('#myModal__close, #myOverlay').click( function(){
                        $('#myModal').animate({opacity: 0}, 198, function(){
                          $(this).css('display', 'none');
                          $('#myOverlay').fadeOut(297);
                          $("#form-submit").show();
                        });
                    });

                } else {
                    alert(response);
                }
            },
            error: function(response) { // Данные не отправлены
                alert(response);
            }

        });

    }
    </script>
@endsection