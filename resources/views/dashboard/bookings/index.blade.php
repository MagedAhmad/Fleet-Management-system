<x-layout :title="trans('bookings.plural')" :breadcrumbs="['dashboard.bookings.index']">
    @component('dashboard::components.table-box')

        @slot('title', trans('bookings.actions.list'))

        <thead>
        <tr>
            <th>@lang('bookings.attributes.customer_id')</th>
            <th>@lang('bookings.attributes.bus_id')</th>
            <th>@lang('bookings.attributes.seat_id')</th>
            <th>@lang('bookings.attributes.start_id')</th>
            <th>@lang('bookings.attributes.end_id')</th>
            <th>@lang('bookings.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($bookings as $booking)
            <tr>
                <td>
                    {{ $booking->customer->name }}
                </td>
                <td>
                    {{ $booking->bus->id }}
                </td>
                <td>
                    {{ $booking->seat->id }}
                </td>
                <td>
                    {{ $booking->start->station->name }}
                </td>
                <td>
                    {{ $booking->end->station->name }}
                </td>
                <td>{{ $booking->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.bookings.partials.actions.show')
                    @include('dashboard.bookings.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('bookings.empty')</td>
            </tr>
        @endforelse

        @if($bookings->hasPages())
            @slot('footer')
                {{ $bookings->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
