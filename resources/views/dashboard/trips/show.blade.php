<x-layout :title="$trip->id" :breadcrumbs="['dashboard.trips.show', $trip]">
    @component('dashboard::components.box')
        @slot('bodyClass', 'p-0')

        <table class="table table-striped table-middle">
            <tbody>
                <tr>
                    <th width="200">@lang('trips.attributes.depature_station_id')</th>
                    <td>{{ $trip->depature_station->name }}</td>
                </tr>
                <tr>
                    <th width="200">@lang('trips.attributes.arrival_station_id')</th>
                    <td>{{ $trip->arrival_station->name }}</td>
                </tr>
            </tbody>
        </table>

        @slot('footer')
            @include('dashboard.trips.partials.actions.stoppages')
            @include('dashboard.trips.partials.actions.delete')
        @endslot
    @endcomponent

</x-layout>
