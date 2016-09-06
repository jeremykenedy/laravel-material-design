<div class="tab-pane {{{ $status or '' }}}" id="{{ $tab }}">
    <h1>
        {{ $title }}
    </h1>

    <div class="table-responsive">
        <table class="table table-striped task-table table-condensed">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th colspan="3">Status</th>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    @include('tasks.partials.task-row')
                @endforeach
            </tbody>
        </table>
    </div>
</div>