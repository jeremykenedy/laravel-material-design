@extends('layouts.dashboard')

@section('template_title')
    My Task List
@endsection

@section('template_fastload_css')
@endsection

@section('header')
    My Tasks
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
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="active">
        <a itemprop="item" href="" class="">
            <span itemprop="name">
                My Tasks
            </span>
        </a>
        <meta itemprop="position" content="2" />
    </li>

@endsection

@section('content')

    @if (count($tasks) > 0)

        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">

            <div class="mdl-tabs__tab-bar">
                <a href="#all" class="mdl-tabs__tab is-active">All</a>
                <a href="#incomplete" class="mdl-tabs__tab">Incomplete</a>
                <a href="#complete" class="mdl-tabs__tab">Complete</a>
            </div>

            @include('tasks/partials/task-tab', ['tab' => 'all', 'tasks' => $tasks, 'title' => 'All Tasks', 'status' => 'is-active'])
            @include('tasks/partials/task-tab', ['tab' => 'incomplete', 'tasks' => $tasksInComplete, 'title' => 'Incomplete Tasks'])
            @include('tasks/partials/task-tab', ['tab' => 'complete', 'tasks' => $tasksComplete, 'title' => 'Complete Tasks'])

        </div>

        @include('dialogs.dialog-delete', ['dialogTitle' => 'Confirm Task Deletion', 'dialogSaveBtnText' => 'Delete'])

    @else

    <div class="mdl-grid full-grid margin-top-0 padding-0">
        <div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">
            <div class="mdl-color--grey-700 mdl-color-text--white mdl-card mdl-shadow--2dp" style="width:100%;" itemscope itemtype="https://schema.org/Person">

                <div class="mdl-card__title mdl-card--expand mdl-color--primary mdl-color-text--white">
                    <h4 class="mdl-card__title-text">
                        Start by creating a task
                    </h4>
                </div>

                @include('tasks.partials.create-task')

            </div>
        </div>
    </div>

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

    @else

    @include('scripts.mdl-required-input-fix')

        <script type="text/javascript">
            mdl_dialog('.dialog-button-save');
            mdl_dialog('.dialog-button-icon-save');
        </script>

    @endif

@endsection