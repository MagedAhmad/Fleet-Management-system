@can('create', \App\Models\Trip::class)
    <a href="{{ route('dashboard.trips.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('trips.actions.create')
    </a>
@endcan
