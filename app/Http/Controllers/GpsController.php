<?php

namespace App\Http\Controllers;

use App\Models\GpsData;
use Illuminate\Http\Request;

class GpsController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'latitude'  => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $gps = GpsData::updateOrCreate(
            ['id' => 1],
            $validated
        );

        return response()->json([
            'status'  => true,
            'message' => 'GPS data saved successfully'
        ]);
    }

    public function pageGps()
    {
        $gpsData = GpsData::find(1);

        return view('gps.index', ['gpsData' => $gpsData]);
    }
}
