<x-layout :title="$station->name" :breadcrumbs="['dashboard.stations.show', $station]">
    @component('dashboard::components.box')
        @slot('bodyClass', 'p-0')

        <table class="table table-striped table-middle">
            <tbody>
                <tr>
                    <th width="200">@lang('stations.attributes.name')</th>
                    <td>{{ $station->name }}</td>
                </tr>
            </tbody>
        </table>

        @slot('footer')
            @include('dashboard.stations.partials.actions.edit')
            @include('dashboard.stations.partials.actions.delete')
        @endslot
    @endcomponent

</x-layout>
