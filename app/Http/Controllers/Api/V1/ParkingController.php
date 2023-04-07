<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

use App\Http\Resources\ParkingRessource;
use App\Models\Parking;
use App\Services\ParkingPriceService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ParkingController extends Controller
{
    public function start(Request $request)
    {
        $parkingData = $request->validate([
            'vehicle_id' => ['required', 'integer', 'exists:vehicles,id,deleted_at,NULL,user_id,' . auth()->id(),],
            'zone_id'    => ['required', 'integer', 'exists:zones,id'],
        ]);

        if (Parking::active()->where('vehicle_id', $request->vehicle_id)->exists()) {
            return response()->json([
                'error' => ['general' => [' Can\'t start twice using same vehicle. Pleas Stop currently active parking.']],
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $parking = Parking::create($parkingData);
        $parking->load('vehicle', 'zone');

        return ParkingRessource::make($parking);
    }

    public function show(Parking $parking)
    {
        return ParkingRessource::make($parking);
    }

    public function stop(Parking $parking)
    {
        $parking->update([
            'stop_time' => now(),
            'totale_price' => ParkingPriceService::calculatePrice($parking->zone_id, $parking->start_Time),
        ]);
        return ParkingRessource::make($parking);
    }
}
