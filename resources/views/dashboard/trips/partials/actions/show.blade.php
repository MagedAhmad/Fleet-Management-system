@can('view', $trip)
    <a href="{{ route('dashboard.trips.show', $trip) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
