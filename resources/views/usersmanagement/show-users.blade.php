@extends('layouts.dashboard')

@section('template_title')
  Showing Users
@endsection

@section('template_linked_css')
@endsection

@section('header')
    Showing All Users
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
    <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a itemprop="item" href="/users" disabled>
            <span itemprop="name">
                Users List
            </span>
        </a>
        <meta itemprop="position" content="2" />
    </li>
@endsection

@section('content')

<div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop margin-top-0">
    <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        <h2 class="mdl-card__title-text logo-style">
            @if ($totalUsers === 1)
                {{ $totalUsers }} User total
            @elseif ($totalUsers > 1)
                {{ $totalUsers }} Total Users
            @else
                No Users :(
            @endif
        </h2>

    </div>
    <div class="mdl-card__supporting-text mdl-color-text--grey-600 padding-0 context">
        <div class="table-responsive material-table">
            <table id="user_table" class="mdl-data-table mdl-js-data-table data-table" cellspacing="0" width="100%">
              <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">ID</th>
                    <th class="mdl-data-table__cell--non-numeric">Username</th>
                    <th class="mdl-data-table__cell--non-numeric">Email</th>
                    <th class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">First Name</th>
                    <th class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">Last Name</th>
                    <th class="mdl-data-table__cell--non-numeric">Role</th>
                    <th class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">Created</th>
                    <th class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">Updated</th>
                    <th class="mdl-data-table__cell--non-numeric no-sort no-search">Actions</th>
                </tr>
              </thead>
              <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric"><a href="{{ URL::to('users/' . $user->id) }}">{{$user->id}}</a></td>
                            <td class="mdl-data-table__cell--non-numeric"><a href="{{ URL::to('users/' . $user->id) }}">{{$user->name}} </a></td>
                            <td class="mdl-data-table__cell--non-numeric"><a href="{{ URL::to('users/' . $user->id) }}">{{$user->email}} </a></td>
                            <td class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only"><a href="{{ URL::to('users/' . $user->id) }}">{{$user->first_name}} </a></td>
                            <td class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only"><a href="{{ URL::to('users/' . $user->id) }}">{{$user->last_name}} </a></td>
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
                                <a href="{{ URL::to('users/' . $user->id) }}">
                                    <span class="mdl-chip mdl-chip--contact {{ $levelBgClass }} mdl-color-text--white md-chip">
                                        <span class="mdl-chip__contact {{ $leveIconlBgClass }} mdl-color-text--white">
                                            <i class="material-icons">{{ $levelIcon }}</i>
                                        </span>
                                        <span class="mdl-chip__text">{{ $levelName }}</span>
                                    </span>
                                </a>
                            </td>
                            <td class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only"><a href="{{ URL::to('users/' . $user->id) }}">{{$user->created_at}} </a></td>
                            <td class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only"><a href="{{ URL::to('users/' . $user->id) }}">{{$user->updated_at}} </a></td>
                            <td class="mdl-data-table__cell--non-numeric">


                                {{-- VIEW USER PROFILE ICON BUTTON --}}
                                <a href="/profile/{{$user->name}}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="View User Profile">
                                    <i class="material-icons mdl-color-text--green">person</i>
                                </a>


                                {{-- VIEW USER ACCOUNT ICON BUTTON --}}
                                <a href="{{ URL::to('users/' . $user->id) }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="View User Account">
                                    <i class="material-icons mdl-color-text--blue">account_circle</i>
                                </a>

                                {{-- EDIT USER ICON BUTTON --}}
                                <a href="{{ URL::to('users/' . $user->id . '/edit') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                    <i class="material-icons mdl-color-text--orange">edit</i>
                                </a>

                                {{-- DELETE ICON BUTTON AND FORM CALL --}}
                                {!! Form::open(array('url' => 'users/' . $user->id, 'class' => 'inline-block', 'id' => 'delete_'.$user->id)) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    <a href="#" class="dialog-button dialiog-trigger-delete dialiog-trigger{{$user->id}} mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-userid="{{$user->id}}">
                                        <i class="material-icons mdl-color-text--red">delete</i>
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

        @include('partials.mdl-search')

        <a href="{{ url('/users/create') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white" title="Add New User">
            <i class="material-icons">person_add</i>
            <span class="sr-only">Add New User</span>
        </a>

        <a href="{{ URL::to('/users/deleted') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white" title="Show Deleted Users">
            <i class="material-icons" aria-hidden="true">delete_sweep</i>
            <span class="sr-only">Show Deleted Users</span>
        </a>

    </div>
</div>

@include('dialogs.dialog-delete')

@endsection

@section('footer_scripts')
    @include('scripts.highlighter-script')
    @include('scripts.mdl-datatables')
    <script type="text/javascript">
        @foreach ($users as $a_user)
            mdl_dialog('.dialiog-trigger{{$a_user->id}}','','#dialog_delete');
        @endforeach
        var userid;
        $('.dialiog-trigger-delete').click(function(event) {
            event.preventDefault();
            userid = $(this).attr('data-userid');
        });
        $('#confirm').click(function(event) {
            $('form#delete_'+userid).submit();
        });
    </script>
@endsection