<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class ParkingRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'zone' => [
                'name' => $this->zone->name,
                'price_per_hour' => $this->zone->price_per_hour,
            ],

            'vehicle' => [
                'plate_number' => $this->vehicle->plate_number,
            ],

            'start_time' => $this->start_Time->ToDateTimeString(),
            // 'stop_time' => $this->stop_time?->ToDateTimeString(),
            'stop_time' => $this->stop_time ? Carbon::parse($this->stop_time)->toDateTimeString() : null,
            'total_price' => $this->total_price,

        ];
    }
}
