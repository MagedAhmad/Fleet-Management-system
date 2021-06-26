@can('create', \App\Models\Station::class)
    <a href="{{ route('dashboard.stations.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('stations.actions.create')
    </a>
@endcan
