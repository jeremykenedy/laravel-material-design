@extends('layouts.dashboard')

@section('template_title')
    Editing Task
@endsection

@section('header')
    Editing Task
@endsection

@if($task->completed == '1')
    @php
        $breadcrumb_status_link     = '/tasks-complete';
        $breadcrumb_status_title    = 'Complete';
    @endphp
@elseif($task->completed == '0')
    @php
        $breadcrumb_status_link     = '/tasks-incomplete';
        $breadcrumb_status_title    = 'Incomplete';
    @endphp
@endif

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
        <a itemprop="item" href="/tasks">
            <span itemprop="name">
                My Tasks
            </span>
        </a>
        <i class="material-icons">chevron_right</i>
        <meta itemprop="position" content="2" />
    </li>
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="{{ $breadcrumb_status_link }}">
            <span itemprop="name">
                {{ $breadcrumb_status_title }}
            </span>
        </a>
        <i class="material-icons">chevron_right</i>
        <meta itemprop="position" content="3" />
    </li>
    <li class="active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="/tasks/{{$task->id}}/edit">
            <span itemprop="name">
                {{$task->name}}
            </span>
        </a>
        <meta itemprop="position" content="4" />
    </li>

@endsection

@section('content')

    <div class="mdl-grid full-grid margin-top-0 padding-0">
        <div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">
            <div class="mdl-color--grey-700 mdl-color-text--white mdl-card mdl-shadow--2dp" style="width:100%;" itemscope itemtype="https://schema.org/Person">

                <div class="mdl-card__title mdl-card--expand mdl-color--primary mdl-color-text--white">
                    <h2 class="mdl-card__title-text">
                        {{$task->name}}
                    </h2>
                </div>

                {!! Form::model($task, array('action' => array('TasksController@update', $task->id), 'method' => 'PUT', 'role' => 'form')) !!}

                    <div class="mdl-card__supporting-text">
                        <div class="mdl-grid full-grid padding-0">
                            <div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">

                                <div class="mdl-grid ">

                                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('name') ? 'is-invalid' :'' }}">
                                            {!! Form::text('name', NULL, array('id' => 'name', 'class' => 'mdl-textfield__input mdl-color-text--white')) !!}
                                            {!! Form::label('name', 'Task Name', array('class' => 'mdl-textfield__label mdl-color-text--primary')); !!}
                                            <span class="mdl-textfield__error">Task name is required</span>
                                        </div>
                                    </div>

                                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth {{ $errors->has('user_level') ? 'is-invalid' :'' }}">
                                            {!! Form::select('completed', array('1' => 'Complete', '0' => 'Incomplete'), $task->completed, array('class' => 'mdl-selectfield__select mdl-textfield__input mdl-color-text--white', 'id' => 'status')) !!}
                                            <label for="completed">
                                                <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                                            </label>
                                            {!! Form::label('completed', 'Task Status', array('class' => 'mdl-textfield__label mdl-selectfield__label mdl-color-text--primary')); !!}
                                            <span class="mdl-textfield__error"></span>
                                        </div>
                                    </div>

                                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('description') ? 'is-invalid' :'' }}">
                                            {!! Form::textarea('description', NULL, array('id' => 'description', 'class' => 'mdl-textfield__input mdl-color-text--white')) !!}
                                            {!! Form::label('description', 'Task Description', array('class' => 'mdl-textfield__label mdl-color-text--primary')); !!}
                                            <span class="mdl-textfield__error"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mdl-card__actions padding-top-0">
                        <div class="mdl-grid padding-top-0">
                            <div class="mdl-cell mdl-cell--12-col padding-top-0 margin-top-0 margin-left-1-1">

                                {{-- SAVE BUTTON--}}
                                <span class="save-actions">
                                    {!! Form::button('Update Task', array('class' => 'dialog-button-save mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--primary mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop margin-right-1 padding-left-1 padding-right-1 ')) !!}
                                </span>

                                {{-- DELETE TASK BUTTON--}}
                                {!! Form::button('Delete Task', array('class' => 'dialog-button-delete mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--accent mdl-button-colored mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop padding-left-1 padding-right-1 ')) !!}

                            </div>
                        </div>
                    </div>

                    <div class="mdl-card__menu mdl-color-text--white">

                        {{-- SAVE ICON --}}
                        <span class="save-actions">
                            {!! Form::button('<i class="material-icons">save</i>', array('class' => 'dialog-button-icon-save mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-button-colored', 'title' => 'Update Task')) !!}
                        </span>

                        {{-- DELETE USER ICON --}}
                        <a href="#" class="dialog-button-delete-icon dialiog-trigger-delete dialiog-trigger{{$task->id}} mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-taskid="{{$task->id}}" title="Delete Task">
                            <i class="material-icons">delete</i>
                        </a>

                    </div>

                    @include('dialogs.dialog-save')

                {!! Form::close() !!}

                {!! Form::open(array('class' => '', 'id' => 'delete', 'method' => 'DELETE', 'route' => array('tasks.destroy', $task->id))) !!}
                    {{ method_field('DELETE') }}
                    @include('dialogs.dialog-delete', ['dialogTitle' => 'Confirm Task Deletion', 'dialogSaveBtnText' => 'Delete'])
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')

    @include('scripts.mdl-required-input-fix')

    <script type="text/javascript">
        mdl_dialog('.dialog-button-save');
        mdl_dialog('.dialog-button-icon-save');
        mdl_dialog('.dialog-button-delete','.dialog-delete-close','#dialog_delete');
        mdl_dialog('.dialog-button-delete-icon','.dialog-delete-close','#dialog_delete');
    </script>

@endsection