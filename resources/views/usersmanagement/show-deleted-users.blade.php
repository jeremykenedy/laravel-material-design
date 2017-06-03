@extends('layouts.dashboard')

@section('template_title')
    Deleted Users
@endsection

@php
    $dataTablesShowCount = 5;   // Number of users at which to show the datatables
    $deletedUsersCount = count($users);
@endphp

@section('header')
    Showing Deleted Users
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
    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a itemprop="item" href="/users" disabled>
            <span itemprop="name">
                Users List
            </span>
        </a>
        <i class="material-icons">chevron_right</i>
        <meta itemprop="position" content="2" />
    </li>
    <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a itemprop="item" href="/users/deleted" disabled>
            <span itemprop="name">
                Deleted Users
            </span>
        </a>
        <meta itemprop="position" content="3" />
    </li>

@endsection

@section('content')

    <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop margin-top-0">
        <div class="mdl-card__title mdl-color--red-400 mdl-color-text--white">
            <h2 class="mdl-card__title-text logo-style">
                @if ($deletedUsersCount === 1)
                    {{ $deletedUsersCount }} Deleted User
                @elseif ($deletedUsersCount > 1)
                    {{ $deletedUsersCount }} Deleted Users
                @else
                    No Records Found
                @endif
            </h2>
        </div>
        <div class="mdl-card__supporting-text mdl-color-text--grey-600 padding-0 context">
            <div class="table-responsive material-table">
                @if ($deletedUsersCount >= 1)
                    <table id="user_table" class="mdl-data-table mdl-js-data-table data-table" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">ID</th>
                            <th class="mdl-data-table__cell--non-numeric">Username</th>
                            <th class="mdl-data-table__cell--non-numeric">Email</th>
                            <th class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">First Name</th>
                            <th class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">Last Name</th>
                            <th class="mdl-data-table__cell--non-numeric">Role</th>
                            <th class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">Deleted</th>
                            <th class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">Deleted IP</th>
                            <th class="mdl-data-table__cell--non-numeric no-sort no-search">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric">{{$user->id}}</td>
                                    <td class="mdl-data-table__cell--non-numeric">{{$user->name}} </td>
                                    <td class="mdl-data-table__cell--non-numeric">{{$user->email}} </td>
                                    <td class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">{{$user->first_name}} </td>
                                    <td class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">{{$user->last_name}} </td>
                                    <td class="mdl-data-table__cell--non-numeric">
                                        @foreach ($user->roles as $user_role)
                                            @if ($user_role->name == 'User')
                                                @php
                                                    $levelIcon        = 'person';
                                                    $levelName        = 'User';
                                                    $levelBgClass     = 'mdl-color--blue-200';
                                                    $leveIconlBgClass = 'mdl-color--blue-500';
                                                @endphp
                                            @elseif ($user_role->name == 'Admin')
                                                @php
                                                    $levelIcon        = 'supervisor_account';
                                                    $levelName        = 'Admin';
                                                    $levelBgClass     = 'mdl-color--red-200';
                                                    $leveIconlBgClass = 'mdl-color--red-500';
                                                @endphp
                                            @elseif ($user_role->name == 'Unverified')
                                                @php
                                                    $levelIcon        = 'person_outline';
                                                    $levelName        = 'Unverified';
                                                    $levelBgClass     = 'mdl-color--orange-200';
                                                    $leveIconlBgClass = 'mdl-color--orange-500';
                                                @endphp
                                            @else
                                                @php
                                                    $levelIcon        = 'person_outline';
                                                    $levelName        = 'Unverified';
                                                    $levelBgClass     = 'mdl-color--orange-200';
                                                    $leveIconlBgClass = 'mdl-color--orange-500';
                                                @endphp
                                            @endif
                                        @endforeach

                                        <span class="mdl-chip mdl-chip--contact {{ $levelBgClass }} mdl-color-text--white md-chip">
                                            <span class="mdl-chip__contact {{ $leveIconlBgClass }} mdl-color-text--white">
                                                <i class="material-icons">{{ $levelIcon }}</i>
                                            </span>
                                            <span class="mdl-chip__text">{{ $levelName }}</span>
                                        </span>

                                    </td>
                                    <td class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">{{$user->deleted_at}}</td>
                                    <td class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">{{$user->deleted_ip_address}}</td>
                                    <td class="mdl-data-table__cell--non-numeric">

                                        <a href="{{ URL::to('users/deleted/' . $user->id) }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="View Deleted User" id="view_deleted_user_{{$user->id}}">
                                            <i class="material-icons mdl-color-text--orange-300">account_circle</i>
                                            <span class="sr-only">View Deleted User</span>
                                            <span class="mdl-tooltip mdl-tooltip--top" for="view_deleted_user_{{$user->id}}">
                                                View Deleted User
                                            </span>
                                        </a>

                                        {!! Form::model($user, ['action' => ['SoftDeletesController@update', $user->id],  'method' => 'PUT', 'class' => 'inline-block', 'id' => 'restore_'.$user->id]) !!}
                                            <a href="#" class="dialog-button dialiog-trigger-restore dialiog-trigger-restore-{{$user->id}} mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-userid="{{$user->id}}" id="restore_user_{{$user->id}}">
                                                <i class="material-icons mdl-color-text--green">replay</i>
                                                <span class="sr-only">Restore Deleted User</span>
                                                <span class="mdl-tooltip mdl-tooltip--top" for="restore_user_{{$user->id}}">
                                                    Restore Deleted User
                                                </span>
                                            </a>
                                        {!! Form::close() !!}

                                        {!! Form::model($user, ['action' => ['SoftDeletesController@destroy', $user->id],  'method' => 'DELETE', 'class' => 'inline-block', 'id' => 'delete_'.$user->id]) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            <a href="#" class="dialog-button dialiog-trigger-delete dialiog-trigger{{$user->id}} mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-userid="{{$user->id}}" id="delete_user_{{$user->id}}">
                                                <i class="material-icons mdl-color-text--red">delete_forever</i>
                                                <span class="sr-only">Permanently Delete User</span>
                                                <span class="mdl-tooltip mdl-tooltip--top" for="delete_user_{{$user->id}}">
                                                    Permanently Delete User
                                                </span>
                                            </a>
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                            @endforeach
                      </tbody>
                    </table>
                @else
                    <p class="text-center margin-top-4">
                        No Deleted Users
                    </p>
                @endif
            </div>
        </div>
        <div class="mdl-card__menu" style="top: -4px;">

            @if ($deletedUsersCount != 0)
                @include('partials.mdl-highlighter')
            @endif

            @if ($deletedUsersCount > $dataTablesShowCount)
                @include('partials.mdl-search')
            @endif

            <a href="{{ url('/users/') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white" title="Back to Users" @if ($deletedUsersCount == 0) style="top: 16px" @endif>
                <i class="material-icons">reply</i>
                <span class="sr-only">Back to Users</span>
            </a>

        </div>
    </div>

    @if ($deletedUsersCount != 0)
        @include('dialogs.dialog-delete')
        @include('dialogs.dialog-restore')
    @endif

@endsection

@section('footer_scripts')

    @if ($deletedUsersCount > $dataTablesShowCount)
        @include('scripts.mdl-datatables')
    @endif

    @if ($deletedUsersCount != 0)
        @include('scripts.highlighter-script')

        <script type="text/javascript">
            @foreach ($users as $a_user)
                mdl_dialog('.dialiog-trigger{{$a_user->id}}','','#dialog_delete');
                mdl_dialog('.dialiog-trigger-restore-{{$a_user->id}}','.dialog-restore-close','#dialog_restore');
            @endforeach
            var userid;
            $('.dialiog-trigger-delete, .dialiog-trigger-restore').click(function(event) {
                event.preventDefault();
                userid = $(this).attr('data-userid');
            });
            $('#confirm').click(function(event) {
                $('form#delete_'+userid).submit();
            });
            $('#confirm_restore').click(function(event) {
                $('form#restore_'+userid).submit();
            });
        </script>

    @endif

@endsection