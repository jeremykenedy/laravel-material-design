@extends('layouts.dashboard')

@php

    if (Request::is('tasks-all')) {

        $current_view = 'All Tasks';

    } elseif (Request::is('tasks-incomplete')) {

        $current_view = 'Incomplete Tasks';

    } elseif (Request::is('tasks-complete')) {

        $current_view = 'Completed Tasks';
    } else {

        $current_view = 'No Tasks';
    }

@endphp

@if (count($tasks) > 0)

    @php

        $task_view_title = $current_view;

    @endphp

@else

    @php

        $task_view_title = $current_view . ' (None)';

    @endphp

@endif

@section('template_title')
    {{ $current_view }}
@endsection

@section('template_fastload_css')

    @if (!count($tasks) > 0)

        .mdl-textfield.search-white,
        div.material-table table tr {
            display: none;
        }

    @endif

@endsection

@section('header')
    {{ $current_view }}
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

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="{{url('/tasks-all')}}">
            <span itemprop="name">
                My Tasks
            </span>
        </a>
        <i class="material-icons">chevron_right</i>
        <meta itemprop="position" content="2" />
    </li>

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="active">
        <a itemprop="item" href="">
            <span itemprop="name">
                {{ $current_view }}
            </span>
        </a>
        <meta itemprop="position" content="3" />
    </li>

@endsection

@section('content')

    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">

        <div class="mdl-tabs__tab-bar simulated-tabs">

            <a href="{{ url('/tasks-all') }}" class="mdl-tabs__tab {{ Request::is('tasks-all') ? 'is-active' : '' }} ">
                All
            </a>

            <a href="{{ url('/tasks-incomplete') }}" class="mdl-tabs__tab {{ Request::is('tasks-incomplete') ? 'is-active' : '' }} ">
                Incomplete
            </a>

            <a href="{{ url('/tasks-complete') }}" class="mdl-tabs__tab {{ Request::is('tasks-complete') ? 'is-active' : '' }} ">
                Complete
            </a>

        </div>

        @include('tasks/partials/task-tab', array('tab' => '', 'tasks' => $tasks, 'title' => $task_view_title, 'status' => 'is-active'))

    </div>

    @if (count($tasks) > 0)

        @include('dialogs.dialog-delete', ['dialogTitle' => 'Confirm Task Deletion', 'dialogSaveBtnText' => 'Delete'])

    @endif

@endsection

@section('footer_scripts')

    @if (count($tasks) > 0)

        @include('scripts.mdl-datatables')

        <script type="text/javascript">

            @foreach ($tasks as $task)
                mdl_dialog('.dialiog-trigger{{$task->id}}','','#dialog_delete');
            @endforeach

            var taskId;

            $('.dialiog-trigger-delete').click(function(event) {
                event.preventDefault();
                taskId = $(this).attr('data-taskid');
            });

            $('#confirm').click(function(event) {
                $('form#delete_'+taskId).submit();
            });

        </script>

    @endif

    <script type="text/javascript">

        $('.simulated-tabs .mdl-tabs__tab').click(function(event) {
            event.preventDefault();
            window.location.href = $(this).attr('href');
        });

    </script>

@endsection