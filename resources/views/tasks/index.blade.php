@extends('dashboard')

@section('content')
    <div class="container">
        <div class="col-sm-offset-1 col-sm-10">

            <!-- Display Validation Errors -->
            {{-- @include('common.status') --}}
            @include('partials.mdl-snackbar')

            @if (count($tasks) > 0)

                <div id="content">
                    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active"><a href="#all" data-toggle="tab"><span class="fa fa-tasks" aria-hidden="true"></span> <span class="hidden-xs">All</span></a></li>
                        <li><a href="#incomplete" data-toggle="tab"><span class="fa fa-square-o" aria-hidden="true"></span> <span class="hidden-xs">Incomplete</span></a></li>
                        <li><a href="#complete" data-toggle="tab"><span class="fa fa-check-square-o" aria-hidden="true"></span> <span class="hidden-xs">Complete</span></a></li>
                    </ul>
                    <div id="my-tab-content" class="tab-content">

                        @include('tasks/partials/task-tab', array('tab' => 'all', 'tasks' => $tasks, 'title' => 'All Tasks', 'status' => 'active'))
                        @include('tasks/partials/task-tab', array('tab' => 'incomplete', 'tasks' => $tasksInComplete, 'title' => 'Incomplete Tasks'))
                        @include('tasks/partials/task-tab', array('tab' => 'complete', 'tasks' => $tasksComplete, 'title' => 'Complete Tasks'))

                    </div>
                </div>
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

        </div>
    </div>
@endsection