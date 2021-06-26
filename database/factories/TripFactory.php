<?php

namespace Database\Factories;

use App\Models\Trip;
use App\Models\Station;
use Illuminate\Database\Eloquent\Factories\Factory;

class TripFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trip::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'depature_station_id' => Station::factory(),
            'arrival_station_id' => Station::factory()
        ];
    }
}
