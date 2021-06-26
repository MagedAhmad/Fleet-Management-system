@can('create', \App\Models\Trip::class)
    <a href="{{ route('dashboard.stoppages.index', $trip) }}" title="@lang('stoppages.actions.list')" class="btn btn-outline-success btn-sm">
        <i class="fas fa-bus"></i>
        
    </a>
@endcan
