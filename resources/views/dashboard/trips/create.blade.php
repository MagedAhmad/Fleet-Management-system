<x-layout :title="trans('trips.actions.create')" :breadcrumbs="['dashboard.trips.create']">
    {{ BsForm::resource('trips')->post(route('dashboard.trips.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('trips.actions.create'))

        @include('dashboard.trips.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('trips.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>