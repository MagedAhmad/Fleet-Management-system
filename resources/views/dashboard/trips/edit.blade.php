<x-layout :title="$trip->id" :breadcrumbs="['dashboard.trips.edit', $trip]">
    {{ BsForm::resource('trips')->putModel($trip, route('dashboard.trips.update', $trip), ['files' => true]) }}
    @component('dashboard::components.box')
        @slot('title', trans('trips.actions.edit'))

        @include('dashboard.trips.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('trips.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
