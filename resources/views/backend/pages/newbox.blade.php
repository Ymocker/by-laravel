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
            {!! Form::open(['url' => '/admin/addbox']) !!}
            <div class="row">

            <div class="col-12 col-sm-6">

              <div id="fileImg" class="col-12">
                <img src="/siteimg/box.jpg" class="product-image">
              </div>

            </div>
            <div class="col-12 col-sm-6">
              {!! Form::label('length', 'Длина, мм &nbsp;') !!}
              {!! Form::input('number', 'length', '400', ['required' => true, 'max' => 999, 'min' => 1]) !!}
              <hr>
              {!! Form::label('width', 'Ширина, мм &nbsp;') !!}
              {!! Form::input('number', 'width', '400', ['required' => true, 'max' => 999, 'min' => 1]) !!}
              <hr>
              {!! Form::label('height', 'Высота, мм &nbsp;') !!}
              {!! Form::input('number', 'height', '200', ['required' => true, 'max' => 999, 'min' => 1]) !!}
              <hr>
              {!! Form::label('comment', 'Коментарии &nbsp;') !!}
              {!! Form::input('text', 'comment', '', ['maxlength' => 40]) !!}
              <hr>
              <div class="mt-4">

                <a href="/admin/box">
                    <div class="btn btn-primary btn-lg">
                      <i class="fas fa-window-close fa-lg mr-2"></i>
                      Отменить
                    </div>
                </a>

                {!! Form::submit('Сохранить',['class' => 'btn btn-lg btn-outline-secondary', 'id' => 'form-submit', 'data-action' => 'submit']) !!}
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


    </script>
@endsection
