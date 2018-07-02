<div class="mdl-color--grey-700 mdl-card dark-table mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop margin-top-0 mdl-tabs__panel {{{ $status or '' }}}" id="{{ $tab }}">
    <div class="mdl-card__title mdl-color-text--white">
        <h2 class="mdl-card__title-text logo-style">
            {{ $title }}
        </h2>
    </div>
    <div class="mdl-card__supporting-text mdl-color-text--white padding-0">
        <div class="table-responsive material-table inverse">
            <table class="mdl-color--grey-700 mdl-color-text--white mdl-data-table-block mdl-js-data-table data-table full-span table-striped" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric mdl-color-text--white no-sort no-search"></th>
                        <th class="mdl-data-table__cell--non-numeric mdl-color-text--white hide-mobile">ID</th>
                        <th class="mdl-data-table__cell--non-numeric mdl-color-text--white">Name</th>
                        <th class="mdl-data-table__cell--non-numeric mdl-color-text--white hide-mobile">Description</th>
                        <th class="mdl-data-table__cell--non-numeric mdl-color-text--white">Status</th>
                        <th class="mdl-data-table__cell--non-numeric mdl-color-text--white no-sort no-search">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        @include('tasks.partials.task-row')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mdl-card__menu" style="top: -5px;">
        @include('partials.mdl-search')
        <a href="{{ url('/tasks/create') }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color-text--white">
            <i class="material-icons">add</i>
        </a>
    </div>
</div>
