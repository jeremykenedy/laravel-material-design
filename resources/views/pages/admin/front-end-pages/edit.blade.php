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



            <form class="form-horizontal" role="form" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="PUT">







<div class="row">
  <div class="col-md-8">
    <div class="form-group">
      <label for="title" class="col-md-2 control-label">
        Title
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="title" autofocus id="title" value="{{ $title }}">
      </div>
    </div>
    <div class="form-group">
      <label for="subtitle" class="col-md-2 control-label">
        Subtitle
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="subtitle" id="subtitle" value="{{ $subtitle }}">
      </div>
    </div>
    <div class="form-group">
      <label for="page_image" class="col-md-2 control-label">
        Page Image
      </label>
      <div class="col-md-10">
        <div class="row">
          <div class="col-md-8">
            <input type="text" class="form-control" name="page_image"
                   id="page_image" onchange="handle_image_change()"
                   alt="Image thumbnail" value="{{ $page_image }}">
          </div>
          <script>
            function handle_image_change() {
              $("#page-image-preview").attr("src", function () {
                var value = $("#page_image").val();
                if ( ! value) {
                  value = {!! json_encode(config('pages.page_image')) !!};
                  if (value == null) {
                    value = '';
                  }
                }
                if (value.substr(0, 4) != 'http' &&
                    value.substr(0, 1) != '/') {
                  value = {!! json_encode(config('pages.uploads.webpath')) !!}
                        + '/' + value;
                }
                return value;
              });
            }
          </script>
          <div class="visible-sm space-10"></div>
          <div class="col-md-4 text-right">
            <img src="{{ page_image($page_image) }}" class="img img_responsive"
                 id="page-image-preview" style="max-height:40px">
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="content" class="col-md-2 control-label">
        Content
      </label>
      <div class="col-md-10">
        <textarea class="form-control" name="content" rows="14" id="content">{{ $content }}</textarea>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label for="publish_date" class="col-md-3 control-label">
        Pub Date
      </label>
      <div class="col-md-8">
        <input class="form-control" name="publish_date" id="publish_date"
               type="text" value="{{ $publish_date }}">
      </div>
    </div>
    <div class="form-group">
      <label for="publish_time" class="col-md-3 control-label">
        Pub Time
      </label>
      <div class="col-md-8">
        <input class="form-control" name="publish_time" id="publish_time"
               type="text" value="{{ $publish_time }}">
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-8 col-md-offset-3">
        <div class="checkbox">
          <label>
            <input {{ checked($is_draft) }} type="checkbox" name="is_draft">
            Draft?
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="tags" class="col-md-3 control-label">
        Tags
      </label>
      <div class="col-md-8">
        <select name="tags[]" id="tags" class="form-control" multiple>
          @foreach ($allTags as $tag)
            <option @if (in_array($tag, $tags)) selected @endif
            value="{{ $tag }}">
              {{ $tag }}
            </option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="layout" class="col-md-3 control-label">
        Layout
      </label>
      <div class="col-md-8">
        <input type="text" class="form-control" name="layout"
               id="layout" value="{{ $layout }}">
      </div>
    </div>
    <div class="form-group">
      <label for="meta_description" class="col-md-3 control-label">
        Meta
      </label>
      <div class="col-md-8">
        <textarea class="form-control" name="meta_description"
                  id="meta_description"
                  rows="6">{{ $meta_description }}</textarea>
      </div>
    </div>

  </div>
</div>






              <div class="col-md-8">
                <div class="form-group">
                  <div class="col-md-10 col-md-offset-2">
                    <button type="submit" class="btn btn-primary btn-lg"
                            name="action" value="continue">
                      <i class="fa fa-floppy-o"></i>
                      Save - Continue
                    </button>
                    <button type="submit" class="btn btn-success btn-lg"
                            name="action" value="finished">
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

        CKEDITOR.replace( 'content' );

    </script>



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
