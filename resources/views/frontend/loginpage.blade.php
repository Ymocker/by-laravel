@extends('frontend.layouts.master')

@section('meta')
    @parent
    <meta name="robots" content="noindex, nofollow"/>
@endsection

@section('nav')
  @parent

      </div>
    </div>
  </nav>
@endsection

@section('content')


    <section class="page-section about-heading">
      <div class="container">
        <div class="about-heading-content">
          <div class="row">
            <div class="col-xl-9 col-lg-10 mx-auto">
              <div class="bg-faded rounded p-5">
                <h2 class="section-heading mb-4">
                  <span class="section-heading-upper">LOGIN PAGE</span>
                  <span class="section-heading-lower">Введите пароль администратора</span>
                </h2>

                <div class="col-lg-10 col-md-8 col-xs-12 about">
                    {!! Form::open(['url' => '/auth', 'id' => 'contactForm',  'role' => 'form']) !!}

                        {!! Form::input('password', 'name', null, ['class' => 'form-control', 'required' => true,
                                        'placeholder' => 'Пароль']) !!}

                        {!! Form::submit('Отправить',['class' => 'btn btn-primary pull-right', 'id' => 'form-submit',
                                        'data-action' => 'submit']) !!}
                        <div id="msgSubmit" class="h3 text-center">&nbsp;</div>

                            <a href="/forget">
                            <div class="btn btn-primary btn">
                              Забыл пароль
                            </div>
                        </a>
                    {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection

@section('scripts')
    @parent
@endsection