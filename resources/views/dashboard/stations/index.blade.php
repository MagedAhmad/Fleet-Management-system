<x-layout :title="trans('stations.plural')" :breadcrumbs="['dashboard.stations.index']">
    @component('dashboard::components.table-box')

        @slot('title', trans('stations.actions.list'))

        @slot('tools')
            @include('dashboard.stations.partials.actions.create')
        @endslot

        <thead>
        <tr>
            <th>@lang('stations.attributes.name')</th>
            <th>@lang('stations.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($stations as $station)
            <tr>
                <td>
                    <a href="{{ route('dashboard.stations.show', $station) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $station->name }}
                    </a>
                </td>
                
                <td>{{ $station->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.stations.partials.actions.show')
                    @include('dashboard.stations.partials.actions.edit')
                    @include('dashboard.stations.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('stations.empty')</td>
            </tr>
        @endforelse

        @if($stations->hasPages())
            @slot('footer')
                {{ $stations->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
