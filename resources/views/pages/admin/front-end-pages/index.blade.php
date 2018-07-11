@extends('layouts.dashboard')

@section('template_title')
    Listing Front End Pages
@endsection

@section('header')
    Listing Front End Pages
@endsection

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
    <li class="active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="/admin/pages" disabled>
            <span itemprop="name">
                Front End Pages
            </span>
        </a>
        <meta itemprop="position" content="2" />
    </li>
@endsection

@section('content')

    {{--
    @include('admin.partials.errors')
    @include('admin.partials.success')
    --}}

    <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop margin-top-0">
        <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
            <h2 class="mdl-card__title-text logo-style">
               Front End Pages
            </h2>
        </div>

        <div class="mdl-card__supporting-text mdl-color-text--grey-600 padding-0 context">
            <div class="table-responsive material-table">
                <table id="user_table" class="mdl-data-table mdl-js-data-table data-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">Published</th>
                            <th class="mdl-data-table__cell--non-numeric">Title</th>
                            <th class="mdl-data-table__cell--non-numeric">Subtitle</th>
                            <th class="mdl-data-table__cell--non-numeric no-sort no-search">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $page)
                            <tr>

                                <td class="mdl-data-table__cell--non-numeric" data-order="{{ $page->published_at }}">
                                    {{ $page->published_at }}
                                </td>
                                <td class="mdl-data-table__cell--non-numeric">
                                    {{ $page->title }}
                                </td>

                                <td class="mdl-data-table__cell--non-numeric">
                                    {{ $page->subtitle }}
                                </td>


                                <td class="mdl-data-table__cell--non-numeric">
                                    <a href="/admin/pages/{{ $page->id }}/edit" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                        <i class="material-icons mdl-color-text--orange">edit</i>
                                        <span class="sr-only">Edit Page</span>
                                    </a>

                                    <a href="/{{ $page->slug }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                        <i class="material-icons mdl-color-text--green-700">remove_red_eye</i>
                                        <span class="sr-only">Edit Page</span>
                                    </a>

                                    {!! Form::open(array('class' => 'inline-block', 'id' => 'delete_'.$page->id, 'method' => 'DELETE', 'route' => array('pages.destroy', $page->id))) !!}
                                        {{ method_field('DELETE') }}
                                        <a href="#" class="dialog-button dialiog-trigger-delete dialiog-trigger{{$page->id}} mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-pageid="{{$page->id}}">
                                            <i class="material-icons mdl-color-text--danger">delete_forever</i>
                                            <span class="sr-only">Delete Page</span>
                                        </a>
                                    {!! Form::close() !!}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if (count($pages) > 0)
                @include('dialogs.dialog-delete', ['dialogTitle' => 'Confirm Page Deletion', 'dialogSaveBtnText' => 'Delete'])
            @endif

        </div>

        <div class="mdl-card__menu" style="top: -5px;">

            @include('partials.mdl-highlighter')

            @if (count($pages) > 0)
                @include('partials.mdl-search')
            @endif

            <a href="{{ url('/admin/pages/create') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color-text--white">
                <i class="material-icons">add</i>
            </a>
        </div>
    </div>

@endsection

@section('footer_scripts')

    @include('scripts.highlighter-script')

    @if (count($pages) > 0)

        @include('scripts.mdl-datatables')

        <script type="text/javascript">

            @foreach ($pages as $page)
                mdl_dialog('.dialiog-trigger{{$page->id}}','','#dialog_delete');
            @endforeach

            var pageId;

            $('.dialiog-trigger-delete').click(function(event) {
                event.preventDefault();
                pageId = $(this).attr('data-pageid');
            });

            $('#confirm').click(function(event) {
                $('form#delete_'+pageId).submit();
            });

        </script>

    @endif

@endsection
