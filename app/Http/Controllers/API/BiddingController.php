<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bidding;

class BiddingController extends Controller
{
    protected function create(Request $request)
    {
        $validatedData = $request->validate([
            'partner_id' => 'required',
            'inquiry_id' => 'string',
            'bidding_price' => 'required',
        ]);

        $bidding = Bidding::create([
            'partner_id' => $validatedData['partner_id'],
            'inquiry_id' => $validatedData['inquiry_id'],
            'bidding_price' => $validatedData['bidding_price'],
        ]);

        return response()->json($bidding);
    }
}
