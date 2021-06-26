@include('dashboard.errors')

<div class="form-group">
    <label for="depature_station_id">
        @lang('trips.attributes.depature_station_id')
    </label>
    <select name="depature_station_id" class="form-control">
        @foreach($stations as $station)
            <option value="{{$station->id}}">{{ $station->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="arrival_station_id">
        @lang('trips.attributes.arrival_station_id')
    </label>
    <select name="arrival_station_id" class="form-control">
        @foreach($stations as $station)
            <option value="{{$station->id}}">{{ $station->name }}</option>
        @endforeach
    </select>
</div>