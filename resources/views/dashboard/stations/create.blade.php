<x-layout :title="trans('stations.actions.create')" :breadcrumbs="['dashboard.stations.create']">
    {{ BsForm::resource('stations')->post(route('dashboard.stations.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('stations.actions.create'))

        @include('dashboard.stations.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('stations.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>