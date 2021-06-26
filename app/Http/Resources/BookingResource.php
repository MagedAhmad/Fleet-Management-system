<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
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
            'bus' => $this->bus_id,
            'seat' => $this->seat_id,
            'start' => $this->start->name,
            'end' => $this->end->name,
            'customer' => new CustomerResource($this->customer)
        ];
    }
}
