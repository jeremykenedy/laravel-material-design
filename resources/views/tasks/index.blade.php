@extends('dashboard')


@section('template_title')
    My Task List
@endsection

@section('template_fastload_css')

    .mdl-checkbox__box-outline {
        border: 2px solid rgba(255,255,255,1);
    }

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
        <a itemprop="item" href="" class="hidden">
            <span itemprop="name">
                My Tasks
            </span>
        </a>
        <meta itemprop="position" content="3" />
        My Tasks
    </li>

@endsection

@section('content')

    @if (count($tasks) > 0)
{{--
        <div class="mdl-grid margin-top-0-important padding-top-0-important">

            <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop">

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

            </div>

        </div> --}}


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