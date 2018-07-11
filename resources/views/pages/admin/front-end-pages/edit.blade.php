@extends('layouts.dashboard')

@section('template_title')
    Editing Front End Page {{ $title }}
@endsection

@section('header')
    Editing Front End Page
@endsection

@section('template_linked_css')
  <link href="/assets/pickadate/themes/default.css" rel="stylesheet">
  <link href="/assets/pickadate/themes/default.date.css" rel="stylesheet">
  <link href="/assets/pickadate/themes/default.time.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.5/css/selectize.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.5/css/selectize.bootstrap3.min.css" rel="stylesheet">
@stop

@section('breadcrumbs')
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="{{url('/')}}">
            <span itemprop="name">
                {{ trans('titles.app') }}
            </span>
        </a>
        <i class="material-icons">chevron_right</i>
        <meta itemprop="position" content="1" />
    </li>
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="/admin/pages">
            <span itemprop="name">
                Front End Pages
            </span>
        </a>
        <i class="material-icons">chevron_right</i>
        <meta itemprop="position" content="2" />
    </li>
    <li class="active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="/admin/pages" disabled>
            <span itemprop="name">
                {{ $title }}
            </span>
        </a>
        <meta itemprop="position" content="3" />
    </li>
@endsection


@section('content')
    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Page Edit Form</h3>
          </div>
          <div class="panel-body">

            <form class="form-horizontal" role="form" method="POST" action="{{ route('updatepage', $id) }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="PUT">

              @include('pages.admin.front-end-pages.partials.page-form')

              <div class="col-md-8">
                <div class="form-group">
                  <div class="col-md-10 col-md-offset-2">
                    <button type="submit" class="btn btn-primary btn-lg" name="action" value="continue">
                      <i class="fa fa-floppy-o"></i>
                      Save - Continue
                    </button>
                    <button type="submit" class="btn btn-success btn-lg" name="action" value="finished">
                      <i class="fa fa-floppy-o"></i>
                      Save - Finished
                    </button>
                    <button type="button" class="btn btn-danger btn-lg"
                            data-toggle="modal" data-target="#modal-delete">
                      <i class="fa fa-times-circle"></i>
                      Delete
                    </button>
                  </div>
                </div>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
@endsection





@section('footer_scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.9.2/ckeditor.js"></script>
    <!-- <script type="text/javascript" src="/assets/js/ckeditor.js"></script> -->


    <script type="text/javascript">

        // CKEDITOR.replace( 'content' );

    </script>




    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/picker.js"></script>


    <script src="/assets/pickadate/picker.js"></script>
    <script src="/assets/pickadate/picker.date.js"></script>
    <script src="/assets/pickadate/picker.time.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.5/js/standalone/selectize.min.js"></script>
    <script>
        $(function() {
            $("#publish_date").pickadate({
                format: "mmm-d-yyyy"
            });
            $("#publish_time").pickatime({
                format: "h:i A"
            });
            $("#tags").selectize({
                create: true
            });
        });
    </script>





    <script src="{{ mix('/js/front-end-editor.js') }}"></script>

@stop
