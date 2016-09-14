@extends('dashboard')

@section('template_title')
    My Task List
@endsection

@section('template_fastload_css')
@endsection

@section('header')
    My Tasks
@endsection

@section('breadcrumbs')

    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a itemprop="item" href="{{url('/')}}">
            <span itemprop="name">
                {{ Lang::get('titles.app') }}
            </span>
        </a>
        <i class="material-icons">chevron_right</i>
        <meta itemprop="position" content="1" />
    </li>
    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="active">
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

            @include('tasks/partials/task-tab', array('tab' => 'all', 'tasks' => $tasks, 'title' => 'All Tasks', 'status' => 'is-active'))
            @include('tasks/partials/task-tab', array('tab' => 'incomplete', 'tasks' => $tasksInComplete, 'title' => 'Incomplete Tasks'))
            @include('tasks/partials/task-tab', array('tab' => 'complete', 'tasks' => $tasksComplete, 'title' => 'Complete Tasks'))

        </div>

        @include('dialogs.dialog-delete', ['dialogTitle' => 'Confirm Task Deletion', 'dialogSaveBtnText' => 'Delete'])

    @else

        <div class="panel panel-default">

            <div class="panel-heading">

                Create New Task

            </div>

            <div class="panel-body">

                @include('tasks.partials.create-task')

            </div>

        </div>

    @endif

@endsection

@section('template_scripts')

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

@endsection