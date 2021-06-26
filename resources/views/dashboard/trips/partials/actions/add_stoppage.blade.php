@can('create', \App\Models\Trip::class)
    <a href="{{ route('dashboard.stoppages.create', $trip) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('stoppages.actions.create')
    </a>
@endcan
