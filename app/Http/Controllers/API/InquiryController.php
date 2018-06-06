<?php

namespace App\Http\Controllers\API;

use App\Models\Bidding;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Models\Inquiry;
use Validator;

class InquiryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    protected function index() {
        return response()->json(Inquiry::all());
    }

    protected function create(Request $request)
    {
        $validatedData = $request->validate([
            'good_name' => 'required|string|max:255',
            'url' => 'string|max:255',
            'description' => 'required|string',
            'price' => 'required',
        ]);

        $inquiry = Inquiry::create([
            'good_name' => $validatedData['good_name'],
            'url' => $validatedData['url'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
        ]);

        return response()->json($inquiry);
    }

    protected function read($id)
    {
        $inquiry = Inquiry::find($id);

        return response()->json($inquiry);
    }

    protected function bidding(Request $request)
    {
        $validatedData = $request->validate([
            'inquiry_id' => 'required',
            'partner_id' => 'required',
            'bidding_price' => 'required',
        ]);

        $bidding = Bidding::create([
            'inquiry_id' => $validatedData['inquiry_id'],
            'partner_id' => $validatedData['partner_id'],
            'bidding_price' => $validatedData['bidding_price'],
        ]);

        return response()->json($bidding);
    }
}
