@can('view', $station)
    <a href="{{ route('dashboard.stations.show', $station) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
