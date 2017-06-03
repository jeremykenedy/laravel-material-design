<tr>
    <td>
        {!! Form::model($task, array('action' => ['TasksController@update', $task->id], 'method' => 'PUT', 'class'=>'form-inline', 'role' => 'form')) !!}
            <label for="completed-{{ $task->id }}" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                {!! Form::hidden('name', $task->name, ['id' => 'task-name-'.$task->name]) !!}
                {!! Form::hidden('description', $task->description, ['id' => 'task-description-'.$task->id]) !!}
                {!! Form::checkbox('completed', 1, $task->completed, ['id' => 'completed-'.$task->id, 'class' => 'mdl-checkbox__input','onClick' => 'this.form.submit()']) !!}
                <span class="mdl-checkbox__label sr-only">Complete Task</span>
            </label>
        {!! Form::close() !!}
    </td>

    <td class="mdl-data-table__cell--non-numeric hide-mobile">
        {{ $task->id }}
    </td>

    <td class="mdl-data-table__cell--non-numeric">
        {{ $task->name }}
    </td>

    <td class="mdl-data-table__cell--non-numeric hide-mobile">
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

    <td class="mdl-data-table__cell--non-numeric">
        <a href="{{ route('tasks.edit', $task->id) }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
            <i class="material-icons mdl-color-text--white">edit</i>
            <span class="sr-only">Edit Task</span>
        </a>
        {!! Form::open(array('class' => 'inline-block', 'id' => 'delete_'.$task->id, 'method' => 'DELETE', 'route' => array('tasks.destroy', $task->id))) !!}
            {{ method_field('DELETE') }}
            <a href="#" class="dialog-button dialiog-trigger-delete dialiog-trigger{{$task->id}} mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-taskid="{{$task->id}}">
                <i class="material-icons mdl-color-text--white">delete_forever</i>
                <span class="sr-only">Delete Task</span>
            </a>
        {!! Form::close() !!}
    </td>

</tr>