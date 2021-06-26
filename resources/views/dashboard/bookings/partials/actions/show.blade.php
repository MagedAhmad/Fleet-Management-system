@can('view', $booking)
    <a href="{{ route('dashboard.bookings.show', $booking) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
