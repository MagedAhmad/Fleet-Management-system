<x-layout :title="trans('stoppages.plural')" :breadcrumbs="['dashboard.stoppages.index', $trip]">
    @component('dashboard::components.table-box')

        @slot('title', trans('stoppages.actions.list'))

        @slot('tools')
            @include('dashboard.trips.partials.actions.add_stoppage')
        @endslot

        <thead>
        <tr>
            <th>@lang('stoppages.attributes.station_id')</th>
            <th>@lang('stoppages.attributes.order')</th>
        </tr>
        </thead>
        <tbody>
        @forelse($trip->stoppages()->orderBy('order', 'asc')->get() as $stoppage)
            <tr>
                <td>
                    <a href="{{ route('dashboard.stations.show', $stoppage->station) }}"
                       class="text-decoration-none text-ellipsis">
                       {{ $stoppage->station->name }}
                    </a>
                </td>

                <td>
                       @if($stoppage->order == 100)
                        {{__('stoppages.last_station')}}
                       @elseif($stoppage->order == 0) 
                        {{__('stoppages.first_station')}}
                       @else 
                        {{$stoppage->order}}
                       @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('stoppages.empty')</td>
            </tr>
        @endforelse
    @endcomponent
</x-layout>
