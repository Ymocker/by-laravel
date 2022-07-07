@extends('backend.layouts.master')

@section('meta')
    @parent
    <meta name="description" content="">
    <title>Бел-Янтэх. Карамель леденцовая фигурная.</title>
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
              <h1>{{ $candy->name }}  (ID: <span id="candyID">{{ $candy->id }}</span>)</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">{{ $candy->name }}</h3>
              <div class="col-12">
                <img src="/img/{{ $candy->picture }}.jpg" class="product-image" alt="{{ $candy->name }}">
              </div>
              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="/img/{{ $candy->picture }}.jpg" alt="Product Image"></div>
                <div class="product-image-thumb"><img src="/img/{{ $candy->picture }}u.jpg" alt="Product Image"></div>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{ $candy->name }}</h3>
              <p>Масса: {{ $candy->mass }} г</p>
              <p>Вкус: {{ $candy->taste }}</p>
              <p>Количество {{ $pack1 }}: {{ $candy->shbqty }} шт</p>
              <p>Количество {{ $pack2 }} в гофротаре: {{ $candy->boxqty }} шт</p>
              <p>Размеры гофротары {{ $box }} мм</p>
              <p>Штрихкод: {{ $candy->barcode }}</p>
              <p>К празднику: {{ ($candy->holiday == 1) ? 'Да' : 'Нет' }}</p>
              <hr>
              <p>{{ $candy->comment }}</p>
              <hr>

              <div class="mt-4">
                <div class="btn btn-primary btn-lg" id="delItem">
                  <i class="fas fa-trash fa-lg mr-2"></i>
                  Удалить
                </div>

                <a href="/admin/candyEdit/{{ $candy->id }}">
                    <div class="btn btn-outline-secondary btn-lg">
                      <i class="fas fa-edit fa-lg mr-2"></i>
                      Редактировать
                    </div>
                </a>
              </div>
            </div>
          </div>
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
        $(document).ready(function() {

          $('.product-image-thumb').on('click', function () {
            var $image_element = $(this).find('img');
            $('.product-image').prop('src', $image_element.attr('src'));
            $('.product-image-thumb.active').removeClass('active');
            $(this).addClass('active');
          });

          $('#delItem').on('click', function () {
            if (confirm("Вы действительно хотите удалить этот элемент?")) {
                window.location.href = "/admin/delcandy/"+$("#candyID").html();
                //window.open ('/admin/catalog','_self',false);
            }
          });


        });
    </script>
@endsection