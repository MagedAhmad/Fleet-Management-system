<x-layout :title="trans('trips.plural')" :breadcrumbs="['dashboard.trips.index']">
    @component('dashboard::components.table-box')

        @slot('title', trans('trips.actions.list'))

        @slot('tools')
            @include('dashboard.trips.partials.actions.create')
        @endslot

        <thead>
        <tr>
            <th>@lang('trips.attributes.depature_station_id')</th>
            <th>@lang('trips.attributes.arrival_station_id')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($trips as $trip)
            <tr>
                <td>
                    <a href="{{ route('dashboard.stations.show', $trip->depature_station) }}"
                       class="text-decoration-none text-ellipsis">
                       {{ $trip->depature_station->name }}
                    </a>
                </td>

                <td>
                    <a href="{{ route('dashboard.stations.show', $trip->arrival_station) }}"
                       class="text-decoration-none text-ellipsis">
                       {{ $trip->arrival_station->name }}
                    </a>
                </td>
                

                <td style="width: 160px">
                    @include('dashboard.trips.partials.actions.show')
                    @include('dashboard.trips.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('trips.empty')</td>
            </tr>
        @endforelse

        @if($trips->hasPages())
            @slot('footer')
                {{ $trips->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
