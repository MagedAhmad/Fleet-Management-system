<x-layout :title="$booking->id" :breadcrumbs="['dashboard.bookings.show', $booking]">
    @component('dashboard::components.box')
        @slot('bodyClass', 'p-0')

        <table class="table table-striped table-middle">
            <tbody>
                <tr>
                    <th width="200">@lang('bookings.attributes.bus_id')</th>
                    <td>{{ $booking->bus->id }}</td>
                </tr>
                <tr>
                    <th width="200">@lang('bookings.attributes.seat_id')</th>
                    <td>{{ $booking->seat->id }}</td>
                </tr>
                <tr>
                    <th width="200">@lang('bookings.attributes.start_id')</th>
                    <td>{{ $booking->start->station->name }}</td>
                </tr>
                <tr>
                    <th width="200">@lang('bookings.attributes.end_id')</th>
                    <td>{{ $booking->end->station->name }}</td>
                </tr>
                <tr>
                    <th width="200">@lang('bookings.attributes.customer_id')</th>
                    <td>{{ $booking->customer->name }}</td>
                </tr>
            </tbody>
        </table>

        @slot('footer')
            @include('dashboard.bookings.partials.actions.delete')
        @endslot
    @endcomponent

</x-layout>
