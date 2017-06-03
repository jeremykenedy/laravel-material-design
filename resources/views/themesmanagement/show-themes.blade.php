@extends('layouts.dashboard')

@section('template_title')
  Showing Themes
@endsection

@section('header')
    Showing Themes
@endsection

@php
    $totalThemes = count($themes);
    $enableDataTablesCount = 50;
@endphp

@section('template_fastload_css')
    .mdl-badge[data-badge]:after {
        background-color: inherit;
    }
@endsection

@section('breadcrumbs')

    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a itemprop="item" href="{{url('/')}}">
            <span itemprop="name">
                {{ trans('titles.app') }}
            </span>
        </a>
        <i class="material-icons">chevron_right</i>
        <meta itemprop="position" content="1" />
    </li>
    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="active">
        <a itemprop="item" href="/themes" class="">
            <span itemprop="name">
                Themes
            </span>
        </a>
        <meta itemprop="position" content="2" />
    </li>

@endsection

@section('content')
    <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop margin-top-0">
        <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
            <h2 class="mdl-card__title-text logo-style">
                @if ($totalThemes === 1)
                    {{ $totalThemes }} Themes total
                @elseif ($totalThemes > 1)
                    {{ $totalThemes }} Total Themes
                @else
                    No Themes :(
                @endif
            </h2>

        </div>
        <div class="mdl-card__supporting-text mdl-color-text--grey-600 padding-0 context">
            <div class="table-responsive material-table">
                <table id="themes_table" class="mdl-data-table mdl-js-data-table data-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">{{ trans('themes.themesStatus') }}</th>
                            <th class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">{{ trans('themes.themesUsers') }}</th>
                            <th class="mdl-data-table__cell--non-numeric">{{ trans('themes.themesName') }}</th>
                            {{-- <th class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">{{ trans('themes.themesLink') }}</th> --}}
                            <th class="mdl-data-table__cell--non-numeric no-sort no-search">{{ trans('themes.themesActions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($themes as $theme)
                            @php
                                $themeStatus = [
                                    'name'  => trans('themes.statusDisabled'),
                                    'class' => 'mdl-color--red-400'
                                ];
                                if($theme->status == 1) {
                                    $themeStatus = [
                                        'name'  => trans('themes.statusEnabled'),
                                        'class' => 'mdl-color--green-400'
                                    ];
                                }

                                $themeUsers = 0;
                                $themeCountClass = 'primary';
                                foreach($users as $user) {
                                    if($user->profile && $user->profile->theme_id === $theme->id) {
                                       $themeUsers += 1;
                                    }
                                }
                                $themeCountClass = 'mdl-color--grey-400';
                                if($themeUsers === 1) {
                                    $themeCountClass = 'mdl-color--blue-400';
                                } elseif($themeUsers >= 2) {
                                    $themeCountClass = 'mdl-color--orange-400';
                                } elseif($themeUsers === 5) {
                                    $themeCountClass = 'mdl-color--green-400';
                                } elseif($themeUsers === 10) {
                                    $themeCountClass = 'mdl-color--red-400';
                                }
                            @endphp
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric ">
                                    <span class="badge mdl-color-text--white {{ $themeStatus['class'] }}">
                                        {{ $themeStatus['name'] }}
                                    </span>
                                </td>
                                <td class="mdl-layout--large-screen-only">
                                    <div class="material-icons mdl-badge mdl-badge--overlap {{ $themeCountClass }}" data-badge="{{ $themeUsers }}"></div>
                                </td>
                                <td class="mdl-data-table__cell--non-numeric ">{{$theme->name}}</td>
                                {{--
                                    <td class="mdl-data-table__cell--non-numeric  mdl-layout--large-screen-only">
                                        @if($theme->link != 'null')
                                            <a href="{{$theme->link}}" target="_blank" id="theme_tooltip_{{$theme->id}}">
                                                {{$theme->link}}
                                            </a>
                                            <span class="mdl-tooltip mdl-tooltip--top" for="theme_tooltip_{{$theme->id}}">
                                                Go to Link
                                            </span>
                                        @else
                                            {{$theme->link}}
                                        @endif
                                    </td>
                                --}}
                                <td class="mdl-data-table__cell--non-numeric">
                                    <a href="/themes/{{$theme->id}}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="{{ trans('themes.themesBtnShow') }}" id="view_theme_{{$theme->id}}">
                                        <i class="material-icons mdl-color-text--green-500" aria-hidden="true">remove_red_eye</i>
                                        <span class="sr-only">{{ trans('themes.themesBtnShow') }}</span>
                                        <span class="mdl-tooltip mdl-tooltip--top" for="view_theme_{{$theme->id}}">
                                            {{ trans('themes.themesBtnShow') }}
                                        </span>
                                    </a>
                                    <a href="/themes/{{$theme->id}}/edit" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="{{ trans('themes.themesBtnShow') }}" id="edit_theme_{{$theme->id}}">
                                        <i class="material-icons mdl-color-text--orange-500" aria-hidden="true">create</i>
                                        <span class="sr-only">{{ trans('themes.themesBtnEdit') }}</span>
                                        <span class="mdl-tooltip mdl-tooltip--top" for="edit_theme_{{$theme->id}}">
                                            {{ trans('themes.themesBtnEdit') }}
                                        </span>
                                    </a>

                                    {!! Form::open(['url' => 'themes/' . $theme->id, 'method' => 'delete', 'class' => 'inline-block', 'id' => 'delete_'.$theme->id]) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        <a href="#" class="dialog-button dialiog-trigger-delete dialiog-trigger{{$theme->id}} mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-themeid="{{$theme->id}}" id="delete_theme_{{$theme->id}}">
                                            <i class="material-icons mdl-color-text--red" aria-hidden="true">delete</i>
                                            <span class="sr-only">{{ trans('themes.themesBtnDelete') }}</span>
                                            <span class="mdl-tooltip mdl-tooltip--top" for="delete_theme_{{$theme->id}}">
                                                {{ trans('themes.themesBtnDelete') }}
                                            </span>
                                        </a>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mdl-card__menu" style="top: -4px;">

            @include('partials.mdl-highlighter')

            @if ($totalThemes > $enableDataTablesCount)
                @include('partials.mdl-search')
            @endif

            <a href="{{ url('/themes/create') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white" title="Add New User" id="add_theme">
                <i class="material-icons" aria-hidden="true">add</i>
                <span class="sr-only">{{ trans('themes.btnAddTheme') }}</span>
                <span class="mdl-tooltip mdl-tooltip--top" for="add_theme">
                    Add
                </span>
            </a>

        </div>
    </div>

    @include('dialogs.dialog-delete')

@endsection

@section('footer_scripts')

    @if ($totalThemes > $enableDataTablesCount)
        @include('scripts.mdl-datatables')
    @endif

    @include('scripts.highlighter-script')

    <script type="text/javascript">
        @foreach ($themes as $theme)
            mdl_dialog('.dialiog-trigger{{$theme->id}}','','#dialog_delete');
        @endforeach
        var themeid;
        $('.dialiog-trigger-delete').click(function(event) {
            event.preventDefault();
            themeid = $(this).attr('data-themeid');
        });
        $('#confirm').click(function(event) {
            $('form#delete_'+themeid).submit();
        });
    </script>

@endsection