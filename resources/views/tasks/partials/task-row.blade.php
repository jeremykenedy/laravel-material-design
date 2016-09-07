<tr>
    <td>

        {!! Form::model($task, array('action' => array('TasksController@update', $task->id), 'method' => 'PUT', 'class'=>'form-inline', 'role' => 'form')) !!}

        <label for="completed" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
            {!! Form::hidden('name', $task->name, array('id' => 'task-name')) !!} {!! Form::hidden('description', $task->description, array('id' => 'task-description')) !!} {!! Form::checkbox('completed', 1, $task->completed, ['id' => 'completed', 'class' => 'mdl-checkbox__input','onClick' => 'this.form.submit()']) !!}
            <span class="mdl-checkbox__label sr-only">Complete Task</span>
        </label>

        {!! Form::close() !!}

    </td>

    <td class="mdl-data-table__cell--non-numeric">
        <a href="{{ route('tasks.edit', $task->id) }}" class="pull-right">
            <i class="material-icons mdl-color-text--white">edit</i>
            <span class="sr-only">Edit Task</span>
        </a>
    </td>

    <td class="mdl-data-table__cell--non-numeric">
        {{ $task->id }}
    </td>

    <td class="mdl-data-table__cell--non-numeric">
        {{ $task->name }}
    </td>

    <td class="mdl-data-table__cell--non-numeric">
        {{ $task->description }}
    </td>

    <td class="mdl-data-table__cell--non-numeric">

        @if ($task->completed === 1)

            <span class="badge mdl-color--green-400 mdl-color-text--white">
                Complete
            </span>
        @else

            <span class="badge mdl-color--red-400 mdl-color-text--white">
                Incomplete
            </span>

        @endif

    </td>
</tr>