<div class="mdl-card__supporting-text padding-bottom-0 mdl-color-text--white">
    <h3 class="mdl-card__title-text">
        Incomplete Tasks
    </h3>

        @if(count($incompleteTasks) >= 1)

            <ul style="list-style-type:none; padding-left: .5em;">

                @foreach ($incompleteTasks as $task)

                    <li>

                        {!! Form::model($task, array('action' => array('TasksController@update', $task->id), 'method' => 'PUT', 'class'=>'form-inline', 'role' => 'form')) !!}

                            <label for="completed-{{ $task->id }}" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                                {!! Form::hidden('name', $task->name, array('id' => 'task-name-'.$task->name)) !!}
                                {!! Form::hidden('description', $task->description, array('id' => 'task-description-'.$task->id)) !!}
                                {!! Form::checkbox('completed', 1, $task->completed, ['id' => 'completed-'.$task->id, 'class' => 'mdl-checkbox__input','onClick' => 'this.form.submit()']) !!}
                                <span class="mdl-checkbox__label">
                                    {{ $task->name }}
                                </span>

                            </label>

                        {!! Form::close() !!}

                    </li>

                @endforeach

            </ul>

        @else
            <h6 class="text-center margin-top-2 margin-bottom-3">
                Hooray, you have no incomplete tasks!
            </h6>
        @endif

</div>
<div class="mdl-card__actions mdl-card--border">
    <a href="/tasks" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--blue-grey-50">
        See All Tasks
    </a>
</div>
