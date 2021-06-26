<x-layout :title="trans('stoppages.actions.create')" :breadcrumbs="['dashboard.stoppages.create', $trip]">
    {{ BsForm::resource('stoppages')->post(route('dashboard.stoppages.store', $trip)) }}
    @component('dashboard::components.box')
        @slot('title', trans('stoppages.actions.create'))

        
        <div class="form-group">
            <label for="depature_station_id">
                @lang('stoppages.attributes.station_id')
            </label>
            <select name="station_id" class="form-control">
                @foreach($stations as $station)
                    <option value="{{$station->id}}">{{ $station->name }}</option>
                @endforeach
            </select>
        </div>

        {{ BsForm::number('order')->step(1) }}
        
        @slot('footer')
            {{ BsForm::submit()->label(trans('stoppages.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>