@extends('backend.layouts.master')

@section('meta')
    @parent
    <meta name="description" content="">
    <title>Редактирование</title>
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
            <h1>{{ $candy->name }}</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
            {!! Form::model($candy, ['route' => ['candyUpdate', $candy->id]]) !!}
            <div class="row">

            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">{{ $candy->name }}</h3>
              <div id="fileImg" class="col-12">
                <img src="/img/{{ $candy->picture }}.jpg" class="product-image" alt="{{ $candy->name }}">
              </div>
            <div class="col-12">
                <input id="input__file" type="file" accept=".jpg,.jpeg" hidden="true">
                <label for="input__file" class="col-12 btn btn-primary btn-lg">
                    <i class="fas fa-exchange-alt fa-lg mr-2"></i>
                    <span id="buttonChange">Заменить изображение</span>
                </label>
            </div>
            <div class="col-12 product-image-thumbs">
                <div id="thumb1" class="product-image-thumb"><img src="/img/{{ $candy->picture }}.jpg" alt="Product Image"></div>
                <div id="thumb2" class="product-image-thumb"><img src="/img/{{ $candy->picture }}u.jpg" alt="Product Image"></div>
                <input name="picChange" type="number" value="0" hidden="true">
            </div>

            </div>
            <div class="col-12 col-sm-6">
              {!! Form::label('name', 'Название &nbsp;') !!}
              {!! Form::input('text', 'name', $candy->name, ['required' => true]) !!}
              <hr>
              {!! Form::label('mass', 'Масса, г &nbsp;') !!}
              {!! Form::input('number', 'mass', $candy->mass, ['required' => true]) !!}
              <hr>
              {!! Form::label('taste', 'Вкусы: &nbsp;') !!}
              {!! Form::input('text', 'taste') !!}
              <hr>
              {!! Form::label('shbqty', 'Количество ' . $pack1 . ', шт &nbsp;') !!}
              {!! Form::input('number', 'shbqty') !!}
              <hr>
              {!! Form::label('boxqty', 'Количество ' . $pack2 . ' в гофротаре, шт &nbsp;') !!}
              {!! Form::input('number', 'boxqty') !!}
              <hr>
              {!! Form::label('box_id', 'Гофротара: &nbsp;') !!}
              {!! Form::select('box_id', $boxes->modelKeys(), $sel) !!}
              <br>
              <p id="boxsize">Размеры гофротары {{ $box }} мм</p>
              <hr>
              {!! Form::label('barcode', 'Штрихкод: &nbsp;') !!}
              {!! Form::input('number', 'barcode') !!}
              <hr>
              {!! Form::label('holyday', 'К празднику &nbsp;') !!}
              {!! Form::checkbox('holiday') !!}
              <hr>
              {!! Form::label('comment', 'КОММЕНТАРИЙ: &nbsp;') !!}
              {!! Form::textarea('comment', $candy->comment, ['class' => 'form-control', 'rows' => '3']) !!}
              <hr>
              <div class="mt-4">
                <a href="/admin/candy/{{ $candy->id }}">
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

        $(document).ready(function() {

            $('.product-image-thumb').on('click', function () {
              var $image_element = $(this).find('img');
              $('.product-image').prop('src', $image_element.attr('src'));
//              $('.product-image-thumb.active').removeClass('active');
//              $(this).addClass('active');
              thumbId = $(this).attr("id");
              thumbId = thumbId.charAt(5);
            });

            $('#box_id').on('change', function () {
              var bxs = {!! $boxes !!};
              var bx = bxs[this.value];

              $('#boxsize').html("Размеры гофротары " + bx.length + "x" + bx.width + "x" + bx.height + " мм");
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
                        $('input[name="picChange"]').val(change);
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
