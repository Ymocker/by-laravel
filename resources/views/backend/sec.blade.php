@extends('backend.layouts.master')

@section('meta')
    @parent
    <meta name="description" content="">
    <title>Бел-Янтэх. Карамель леденцовая фигурная. Безопасность.</title>
@endsection

@section('links')
    @parent
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Безопасность</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Изменение пароля и E-mail</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {!! Form::open(['url' => '/admin/securityChange', 'id' => 'contactForm',  'role' => 'form']) !!}
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputEmail">E-mail</label>
                    <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Enter email" value="{{ $email }}">
                  </div>
                  <div class="form-group">
                    <label for="inputPassword">Пароль</label>
                    <input type="text" class="form-control" id="inputPassword" name="inputPassword" placeholder="Новый пароль">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              {!! Form::close() !!}
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
