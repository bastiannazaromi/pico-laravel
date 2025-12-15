<?php

namespace App\Http\Controllers;

use App\Models\SensorData;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'temperature' => 'required|numeric',
            'humidity'    => 'required|numeric'
        ]);

        $data = SensorData::create($validated);

        return response()->json([
            'status'  => true,
            'message' => 'Sensor data stored successfully',
            'data'    => $data
        ]);
    }

    public function latest()
    {
        return SensorData::latest()->first();
    }

    public function pageSensor()
    {
        $data = SensorData::orderBy('id', 'desc')->get();

        return view('sensor.index', compact('data'));
    }

    public function destroy($id)
    {
        $data = SensorData::find($id);

        if (!$data) {
            return response()->json(['status' => false, 'message' => 'Data not found'], 404);
        }

        $data->delete();

        return response()->json(['status' => true, 'message' => 'Data deleted']);
    }
}
