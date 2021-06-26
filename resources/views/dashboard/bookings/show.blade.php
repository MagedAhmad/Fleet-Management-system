<x-layout :title="$booking->id" :breadcrumbs="['dashboard.bookings.show', $booking]">
    @component('dashboard::components.box')
        @slot('bodyClass', 'p-0')

        <table class="table table-striped table-middle">
            <tbody>
            $table->foreignId('bus_id');
            $table->foreignId('seat_id');
            $table->foreignId('start_id');
            $table->foreignId('end_id');
            $table->foreignId('customer_id');
            
                <tr>
                    <th width="200">@lang('bookings.attributes.name')</th>
                    <td>{{ $booking->name }}</td>
                </tr>
            </tbody>
        </table>

        @slot('footer')
            @include('dashboard.bookings.partials.actions.edit')
            @include('dashboard.bookings.partials.actions.delete')
        @endslot
    @endcomponent

</x-layout>
