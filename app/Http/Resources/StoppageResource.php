<?php

namespace App\Http\Resources;

use App\Http\Resources\StationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class StoppageResource extends JsonResource
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
            'trip_id' => $this->trip_id,
            'station' => new StationResource($this->station),
            'order' => $this->order
        ];
    }
}
