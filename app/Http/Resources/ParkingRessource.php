<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use App\Services\ParkingPriceService;

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
        $totalePrice = $this->totale_price ?? ParkingPriceService::calculatePrice(
            $this->zone_id,
            $this->start_Time,
            $this->stop_time
        );

        return [
            'id' => $this->id,

            'zone' => [
                'name' => $this->zone->name,
                'price_per_hour' => $this->zone->price_per_hour,
            ],

            'vehicle' => [
                'plate_number' => $this->vehicle->plate_number,
            ],

            // 'start_time' => $this->start_Time->ToDateTimeString(),
            // 'stop_time' => $this->stop_time?->ToDateTimeString(),
            // 'stop_time' => $this->stop_time ? Carbon::parse($this->stop_time)->toDateTimeString() : null,
            'start_time' => $this->start_time ? \Carbon\Carbon::parse($this->start_time)->toDateTimeString() : null,
            'stop_time' => $this->stop_time ? \Carbon\Carbon::parse($this->stop_time)->toDateTimeString() : null,

            'totale_price' => $this->totalePrice,

        ];
    }
}
