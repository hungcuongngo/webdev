<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Partner;

class PartnerController extends Controller
{
    protected function index() {
        return response()->json(Partner::all());
    }

    protected function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|max:255',
        ]);

        $partner = Partner::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
        ]);

        return response()->json($partner);
    }
}
