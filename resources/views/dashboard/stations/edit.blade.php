<x-layout :title="$station->name" :breadcrumbs="['dashboard.stations.edit', $station]">
    {{ BsForm::resource('stations')->putModel($station, route('dashboard.stations.update', $station), ['files' => true]) }}
    @component('dashboard::components.box')
        @slot('title', trans('stations.actions.edit'))

        @include('dashboard.stations.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('stations.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
