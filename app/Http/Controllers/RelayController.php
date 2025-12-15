<?php

namespace App\Http\Controllers;

use App\Models\RelayData;
use Illuminate\Http\Request;

class RelayController extends Controller
{
    public function status()
    {
        return RelayData::find(1);
    }

    public function update(Request $request)
    {
        $request->validate([
            'status' => 'required|in:0,1'
        ]);

        $relay = RelayData::updateOrCreate(
            ['id' => 1],
            ['status' => $request->status]
        );

        return response()->json([
            'status' => true,
            'relay'  => $relay
        ]);
    }
}
