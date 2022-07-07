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
                  <span class="section-heading-upper">Восстановление доступа</span>
                </h2>

                        <div id="msgSubmit" class="text-center">
                            Вам на почту будет отправлено письмо с инструкцией по восстановлению пароля. <br>
                            В течение 10 минут вы можете восстановить пароль.
                        </div>

                        <a href="/ps">
                        <div class="btn btn-primary btn">
                          Отправить
                        </div>
                        </a>

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