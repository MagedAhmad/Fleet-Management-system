<?php

namespace Database\Seeders;

use App\Models\Trip;
use App\Models\Stoppage;

 use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(StationSeeder::class);

        $this->createTrip();
    }

    protected function createTrip()
    {
        // create trip
        $trip = Trip::factory()->createOne([
            'depature_station_id' => 1,
            'arrival_station_id' => 4
        ]);

        // create stoppages for the trip
        Stoppage::create([
            'trip_id' => $trip->id,
            'station_id' => 2,
            'order' => 1,
        ]);
        
        Stoppage::create([
            'trip_id' => $trip->id,
            'station_id' => 3,
            'order' => 2,
        ]);
    }
}
