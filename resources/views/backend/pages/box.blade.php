@extends('backend.layouts.master')

@section('meta')
    @parent
    <meta name="description" content="">
    <title>Гофротара</title>
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
            <h1>Упаковка / Гофротара / Коробка</h1>
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

              <div id="fileImg" class="col-12">
                <img src="/siteimg/box.jpg" class="product-image">
              </div>

            </div>
            <div class="col-12 col-sm-6">
              {!! Form::label('box_id', 'Гофротара: &nbsp;') !!}
              {!! Form::select('box_id', $boxes->modelKeys(), 0) !!}
              <br>

              <p id="boxsize">Размеры гофротары</p>
              <hr>
              <p id="comment"></p>
              <hr>


              <div class="mt-4">
                <div class="btn btn-primary btn-lg" id="delItem">
                  <i class="fas fa-trash fa-lg mr-2"></i>
                  Удалить
                </div>

                <a id="boxedit" href="boxEdit/1">
                    <div class="btn btn-outline-secondary btn-lg">
                      <i class="fas fa-edit fa-lg mr-2"></i>
                      Редактировать
                    </div>
                </a>

                <a id="boxedit" href="newBox">
                    <div class="btn btn-outline-secondary btn-lg">
                      <i class="fas fa-box fa-lg mr-2"></i>
                      Добавить
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
            var sel;

            var bxs = {!! $boxes !!};
            var bx = bxs[0];
            sel = bx.id;

            $('#boxsize').html("Размеры гофротары " + bx.length + "x" + bx.width + "x" + bx.height + " мм");
            $("#boxedit").attr("href", "boxEdit/" + sel);
            $('#comment').html(bx.comment);

        $('#box_id').on('change', function () {

            sel = $("#box_id option:selected").text();

            var bx = bxs[this.value];

            $('#boxsize').html("Размеры гофротары " + bx.length + "x" + bx.width + "x" + bx.height + " мм");
            $("#boxedit").attr("href", "boxEdit/" + sel);
            $('#comment').html(bx.comment);


        });

        $('#delItem').on('click', function () {
            if (confirm("Вы действительно хотите удалить коробку " + sel + "?")) {
                window.location.href = "/admin/delbox/" + sel;
                //window.open ('/admin/catalog','_self',false);
            }
        });

    });

    </script>
@endsection
