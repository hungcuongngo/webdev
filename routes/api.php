<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('API')->group(function () {
    Route::get('inquiries', 'InquiryController@index');
    Route::get('inquiries/{id}', 'InquiryController@read');
    Route::post('inquiries', 'InquiryController@create');
    Route::post('inquiries/bidding', 'InquiryController@bidding');

    Route::get('partners', 'PartnerController@index');
    Route::post('partners', 'PartnerController@create');

    Route::get('bidding-invites', 'BiddingInviteController@index');
    Route::post('bidding-invites', 'BiddingInviteController@create');
    Route::post('bidding-invites/update-opened/{id}', 'BiddingInviteController@create');
});