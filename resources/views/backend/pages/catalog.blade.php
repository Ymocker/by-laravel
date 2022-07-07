@extends('backend.layouts.master')

@section('meta')
    @parent
    <meta name="description" content="">
    <title>Бел-Янтэх. Карамель леденцовая фигурная. Каталог продукции</title>
@endsection

@section('links')
    @parent
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="/plugins/ekko-lightbox/ekko-lightbox.css">
@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Каталог продукции</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">Каталог продукции</h4>
              </div>
              <div class="card-body">
                <div>
                  <div class="btn-group w-100 mb-2">
                    <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> All items </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="1"> до 30 г </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="2"> от 30 г </a>
                  </div>
                  <div class="mb-2">
                    <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Shuffle items </a>
                    <div class="float-right">
                      <select class="custom-select" style="width: auto;" data-sortOrder>
                        <option value="index"> Sort by Position </option>
                        <option value="sortData"> Sort by Custom Data </option>
                      </select>
                      <div class="btn-group">
                        <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Ascending </a>
                        <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Descending </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="filter-container p-0 row">
                    @foreach ($candies as $candy)
                    <div class="filtr-item col-sm-2"
                         @if ($candy->mass < 30)
                            data-category="1"
                         @else ($candy->mass >= 30)
                            data-category="2"
                         @endif
                         data-sort="colored sample">
                      <a href="/admin/candy/{{ $candy->id }}" "data-toggle="lightbox">
                        <img src="/img/{{ $candy->picture }}.jpg" class="img-fluid mb-2" alt="{{ $candy->name }}"/>
                      </a>
                    </div>
                    @endforeach
                  </div>
                    {{ $candies->links() }}

                </div>

              </div>
            </div>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('scripts')
    @parent
<!-- Ekko Lightbox -->
<script src="/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- Filterizr-->
<script src="/plugins/filterizr/jquery.filterizr.min.js"></script>

<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
@endsection