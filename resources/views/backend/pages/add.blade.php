@extends('backend.layouts.master')

@section('meta')
    @parent
    <meta name="description" content="">
    <title>Добавить новую конфету</title>
@endsection

@section('links')
    @parent
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Добавить новую конфету</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
            {!! Form::open(['url' => '/admin/add']) !!}
            <div class="row">

            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">Название конфеты</h3>
              <div id="fileImg" class="col-12">
                <img src="/img/example.jpg" class="product-image" alt="Название конфеты">
              </div>
            <div class="col-12">
                <input id="input__file" type="file" accept=".jpg,.jpeg" hidden="true">
                <label for="input__file" class="col-12 btn btn-primary btn-lg">
                    <i class="fas fa-exchange-alt fa-lg mr-2"></i>
                    <span id="buttonChange">Заменить изображение</span>
                </label>
            </div>
            <div class="col-12 product-image-thumbs">
                <div id="thumb1" class="product-image-thumb"><img src="/img/example.jpg" alt="Product Image"></div>
                <div id="thumb2" class="product-image-thumb"><img src="/img/example.jpg" alt="Product Image"></div>
                <input name="picChange" type="number" value="0" hidden="true">
            </div>

            </div>
            <div class="col-12 col-sm-6">
              {!! Form::label('name', 'Название &nbsp;') !!}
              {!! Form::input('text', 'name', '', ['required' => true, 'placeholder' => 'Название конфеты']) !!}
              <hr>
              {!! Form::label('mass', 'Масса, г &nbsp;') !!}
              {!! Form::input('number', 'mass', '30', ['required' => true]) !!}
              <hr>
              {!! Form::label('taste', 'Вкусы: &nbsp;') !!}
              {!! Form::input('text', 'taste') !!}
              <hr>
              {!! Form::label('pack', 'Упаковка: &nbsp;') !!}
              {!! Form::select('pack', ['1' => 'шоу-бокс', '2' => 'ведро', '3' => 'стойка', '4' => 'тубус', '5' => 'пакет'], '1') !!}
              <hr>
              {!! Form::label('shbqty', 'Количество конфет в шоубоксе, шт &nbsp;', ['id' => 'lbShbqty']) !!}
              {!! Form::input('number', 'shbqty') !!}
              <hr>
              {!! Form::label('box_id', 'Гофротара: &nbsp;') !!}
              {!! Form::select('box_id', $boxes->modelKeys()) !!}
              <br>
              <p id="boxsize">
                    Размеры гофротары {!! $boxes[0]->length !!}x{!! $boxes[0]->width !!}x{!! $boxes[0]->height !!} мм<br>
                    / {!! $boxes[0]->comment !!} /
              </p>
              <hr>
              {!! Form::label('boxqty', 'Количество шоубоксов в гофротаре, шт &nbsp;', ['id' => 'lbBox']) !!}
              {!! Form::input('number', 'boxqty') !!}
              <hr>
              {!! Form::label('barcode', 'Штрихкод: &nbsp;') !!}
              {!! Form::input('text', 'barcode', '4812324000507', ['maxlength' => 13]) !!}
              <hr>
              {!! Form::label('holyday', 'К празднику &nbsp;') !!}
              {!! Form::checkbox('holiday') !!}
              <hr>
              {!! Form::label('comment', 'КОММЕНТАРИЙ: ') !!}
              {!! Form::textarea('comment', '', ['class' => 'form-control', 'rows' => '3']) !!}
              <hr>
              <div class="mt-4">

 <!--               {!! link_to(URL::previous(), 'Отменить', ['class' => 'btn btn-outline-primary btn-lg', 'autofocus' => 'true']) !!} -->

                <a href="/admin/catalog">
                    <div class="btn btn-primary btn-lg">
                      <i class="fas fa-window-close fa-lg mr-2"></i>
                      Отменить
                    </div>
                </a>

            {!! Form::submit('Сохранить',['class' => 'btn btn-lg btn-outline-secondary', 'id' => 'form-submit',
                                        'data-action' => 'submit']) !!}

              </div>
            </div>
          </div>
          {!! Form::close() !!}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
@endsection

@section('scripts')
    @parent

    <script>
        var thumbId = "1";
        var files;
        var change = 0;
        $("#thumb2").hide();

        $(document).ready(function() {
            $('.product-image-thumb').on('click', function () {
              var $image_element = $(this).find('img');
              $('.product-image').prop('src', $image_element.attr('src'));
//              $('.product-image-thumb.active').removeClass('active');
//              $(this).addClass('active');
              thumbId = $(this).attr("id");
              thumbId = thumbId.charAt(5);


            });

            $('#pack').on('change', function () {
              var inPack = "";
              var inBox = "";
              switch(this.value) {
                  case '2':
                    inPack = 'в ведре';
                    inBox = 'ведер';
                    break;
                  case '3':
                    inPack = 'на стойке';
                    inBox = 'стоек';
                    break;
                  case '4':
                    inPack = 'в тубусе';
                    inBox = 'тубусов';
                    break;
                   case '5':
                    inPack = 'в пакете';
                    inBox = 'пакетов';
                    break;
                  default:
                    inPack = 'в шоу-боксе';
                    inBox = 'шоу-боксов';
              };
              $('#lbShbqty').text("Количество конфет " + inPack + ", шт");
              $('#lbBox').text("Количество " + inBox + " в гофротаре, шт");
            });

            $('#box_id').on('change', function () {
              var bxs = {!! $boxes !!};
              var bx = bxs[this.value];

              $('#boxsize').html("Размеры гофротары " + bx.length + "x" + bx.width + "x" + bx.height + " мм<br>/ " + bx.comment + " /");
            });

            $('input[type=file]').change(function(){
                files = this.files;
                uploadFile();
            });
        });

        function uploadFile() {
            var data = new FormData();
            $.each( files, function( key, value ){
                data.append( key, value );
            });
            data.append('th', thumbId);
            data.append("_token", "{{ csrf_token() }}");

            $.ajax({
                url: '/admin/candyEdit/picupload',
                type: 'POST',
                data: data,
                cache: false,
                //dataType: 'json',
                processData: false, // Не обрабатываем файлы (Don't process the files)
                contentType: false, // Так jQuery скажет серверу что это строковой запрос
                beforeSend: function() {
                    $("#buttonChange").html("Загрузка");
                    $("#input__file").prop("disabled",true);
                },
                success: function( respond, textStatus, jqXHR ){

                    // Если все ОК
                    //alert(respond);

                    if( typeof respond.error === 'undefined' ){
                        // Файлы успешно загружены, делаем что нибудь здесь

                        $("#fileImg").html('<img src="/img/tmp/thumb'+thumbId+'.jpg?'+Math.random()+'" class="product-image" alt=""/>');
                        $("#thumb"+thumbId).html('<img src="/img/tmp/thumb'+thumbId+'.jpg?'+Math.random()+'" class="product-image-thumb" alt="Product Image"/>');

                        change = change | thumbId;
                        //alert(change + '/ th ' + thumbId);
                        $('input[name="picChange"]').val(change);
                        $("#thumb2").fadeIn(500);
                    }
                    else{
                        console.log('ОШИБКИ ОТВЕТА сервера: ' + respond.error );
                    }
                },
                error: function( jqXHR, textStatus, errorThrown ){
                    console.log('ОШИБКИ AJAX запроса: ' + textStatus );
                },
                complete: function() {
                    $("#buttonChange").html("Заменить изображение");
                    $("#input__file").prop("disabled",false);
                }
            });
        }


    </script>
@endsection
