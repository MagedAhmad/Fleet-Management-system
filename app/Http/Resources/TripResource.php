<?php

namespace App\Http\Resources;

use App\Http\Resources\StationResource;
use App\Http\Resources\StoppageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TripResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'depature_station' => new StationResource($this->depature_station),
            'arrival_station' => new StationResource($this->arrival_station),
            'stoppages' => StoppageResource::collection($this->stoppages->sortBy('order')),
        ];
    }
}
