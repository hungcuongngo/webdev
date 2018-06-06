<?php

namespace App\Http\Controllers\API;

use App\Mail\SendBiddingInvite;
use App\Models\Partner;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BiddingInvite;
use App\Models\Inquiry;
use Illuminate\Support\Facades\Mail;

class BiddingInviteController extends Controller
{
    protected function index()
    {
        return response()->json(BiddingInvite::all());
    }

    protected function create(Request $request)
    {
        $validatedData = $request->validate([
            'inquiry_id' => 'required',
            'partner_id' => 'required'
        ]);

        $biddingInvite = BiddingInvite::create([
            'inquiry_id' => $validatedData['inquiry_id'],
            'partner_id' => $validatedData['partner_id'],
        ]);

        $inquiry = Inquiry::find($biddingInvite->inquiry_id);
        $partner = Partner::find($biddingInvite->partner_id);

        Mail::to($partner->email)->queue(new SendBiddingInvite($biddingInvite, $inquiry));

        return response()->json($biddingInvite);
    }

    protected function updateOpened($id)
    {
        $biddingInvite = BiddingInvite::find($id)->update(['opened' => 1]);
        return Image::make(asset('images/button.png'))->response();
    }
}
